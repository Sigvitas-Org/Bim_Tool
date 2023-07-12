<?php

namespace Modules\Recruit\Http\Controllers;

use App\Helper\Files;
use App\Http\Requests\Admin\Employee\StoreRequest;
use App\Models\EmployeeSkill;
use App\Models\Role;
use Carbon\Carbon;
use App\Models\Team;
use App\Helper\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Recruit\Entities\RecruitJob;
use Modules\Recruit\Events\OfferLetterEvent;
use App\Http\Controllers\AccountBaseController;
use App\Models\Designation;
use App\Models\EmployeeDetails;
use App\Models\User;
use Modules\Recruit\Entities\RecruitJobApplication;
use Modules\Recruit\Entities\RecruitJobOfferLetter;
use Modules\Recruit\DataTables\JobOfferLetterDataTable;
use Modules\Recruit\Entities\OfferLetterHistory;
use Modules\Recruit\Entities\Recruiter;
use Modules\Recruit\Http\Requests\OfferLetter\StoreOfferLetter;

class JobOfferLetterController extends AccountBaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = __('recruit::app.menu.offerletter');
    }

    public function index(JobOfferLetterDataTable $dataTable)
    {
        $viewPermission = user()->permission('view_offer_letter');
        abort_403(!in_array($viewPermission, ['all', 'added', 'owned', 'both']));

        $this->jobs = RecruitJob::all();
        $this->departments = Team::all();
        return $dataTable->render('recruit::jobs.ajax.offer-letter', $this->data);
    }

    public function create()
    {
        $addPermission = user()->permission('add_offer_letter');
        abort_403(!in_array($addPermission, ['all', 'added']));
        $this->jobId = request()->id;
        $this->pageTitle = __('recruit::modules.joboffer.addjoboffer');

        $this->jobs = RecruitJob::all();
        $this->jobApplications = RecruitJobApplication::where('job_id', request()->id)->get();
        $this->applications = RecruitJobApplication::all();
        $this->jobOffer = RecruitJob::where('id', request()->id)->first();

        if (request()->ajax()) {
            $html = view('recruit::jobs.ajax.createOfferLetter', $this->data)->render();
            return Reply::dataOnly(['status' => 'success', 'html' => $html, 'title' => $this->pageTitle]);
        }

        $this->view = 'recruit::jobs.ajax.createOfferLetter';

        return view('recruit::jobs.createOfferLetter', $this->data);
    }

    public function show($id)
    {
        $this->jobOffer = RecruitJobOfferLetter::findOrFail($id);
        $this->letter = RecruitJobOfferLetter::with('job')->findOrFail($id);
        $this->viewPermission = user()->permission('view_offer_letter');

        abort_403(!($this->viewPermission == 'all'
        || ($this->viewPermission == 'added' && $this->jobOffer->added_by == user()->id)
        || ($this->viewPermission == 'owned' && user()->id == $this->letter->job->recruiter_id)
        || ($this->viewPermission == 'both' && user()->id == $this->letter->job->recruiter_id)
        || $this->jobOffer->added_by == user()->id));

        $this->jobs = RecruitJob::all();
        $this->applications = RecruitJobApplication::all();

        $this->settings = global_setting();
        $date1 = Carbon::createFromFormat('Y-m-d', $this->jobOffer->job_expire);
        $date2 = Carbon::createFromFormat('Y-m-d', date('Y-m-d'));
        $this->job_not_expired = $date1->greaterThanOrEqualTo($date2); // true means job is not expired

        $this->label_class = '';
        $this->msg = '';

        if ($this->job_not_expired == false) {
            $this->label_class = 'badge badge-dark f-15';
            $this->msg = 'Expired';
        }
        elseif ($this->jobOffer->status == 'accept') {
            $this->label_class = 'badge badge-success f-15';
            $this->msg = 'Accepted';
        }
        elseif ($this->jobOffer->status == 'decline') {
            $this->label_class = 'badge badge-danger f-15';
            $this->msg = 'Declined';
        }
        elseif ($this->jobOffer->status == 'withdraw') {
            $this->label_class = 'badge badge-info f-15';
            $this->msg = 'Withdrawn';
        }
        elseif ($this->jobOffer->status == 'pending') {
            $this->label_class = 'badge badge-warning f-15';
            $this->msg = 'Pending';
        }

        $tab = request('tab');
        $this->activeTab = ($tab == '') ? 'letter' : $tab;

        switch ($tab) {
        case 'history':
            $this->activity = OfferLetterHistory::where('job_offer_id', $id)->orderBy('updated_at', 'desc')->get();
            $this->view = 'recruit::jobs.ajax.history';
            break;
        default:
            $this->view = 'recruit::jobs.ajax.showOfferLetter';
            break;
        }

        if (request()->ajax()) {
            $html = view($this->view, $this->data)->render();
            return Reply::dataOnly(['status' => 'success', 'html' => $html, 'title' => $this->pageTitle]);
        }

        return view('recruit::jobs.offer-letter.show', $this->data);
    }

    public function history($id)
    {
        $viewPermission = user()->permission('view_offer_letter');
        abort_403(!in_array($viewPermission, ['all', 'added', 'owned', 'both']));

        $this->activity = OfferLetterHistory::where('job_offer_id', $id)->orderBy('updated_at', 'desc')->get();

        $tab = request('tab');
        $this->activeTab = ($tab == '') ? 'letter' : $tab;
        return $this->view = 'recruit::jobs.ajax.history';
    }

    public function store(StoreOfferLetter $request)
    {
        $addPermission = user()->permission('add_offer_letter');
        abort_403(!in_array($addPermission, ['all', 'added']));

        $jobOffer = new RecruitJobOfferLetter();

        $jobOffer->job_app_id = $request->jobApplicant;
        $jobOffer->job_id = $request->jobId;

        $jobOffer->job_expire = Carbon::createFromFormat($this->global->date_format, $request->jobExpireDate)->format('Y-m-d');
        $jobOffer->expected_joining_date = Carbon::createFromFormat($this->global->date_format, $request->expJoinDate)->format('Y-m-d');

        $jobOffer->comp_amount = $request->comp_amount;
        $jobOffer->pay_according = $request->pay_according;
        $jobOffer->sign_require = $request->signature;
        $jobOffer->hash = \Illuminate\Support\Str::random(32);

        if ($request->save_type == 'send' || $request->save_type == 'save') {
            $jobOffer->status = 'pending';
        }
        else {
            $jobOffer->status = 'draft';
        }

        $jobOffer->save();

        // Send offer Letter mail if selected save and send

        if ($request->save_type == 'send') {
            event(new OfferLetterEvent($jobOffer));
        }

        $redirectUrl = urldecode($request->redirect_url);

        if ($redirectUrl == '') {
            $redirectUrl = route('job-offer-letter.index');
        }

        return Reply::successWithData(__('recruit::messages.offerAdded'), ['redirectUrl' => $redirectUrl,'application_id' => $jobOffer->id]);
    }

    public function edit($id)
    {
        $this->jobOffer = RecruitJobOfferLetter::findOrFail($id);
        $this->letter = RecruitJobOfferLetter::with('job')->findOrFail($id);

        $this->editPermission = user()->permission('edit_offer_letter');
        abort_403(!($this->editPermission == 'all'
        || ($this->editPermission == 'added' && $this->jobOffer->added_by == user()->id)
        || ($this->editPermission == 'owned' && user()->id == $this->letter->job->recruiter_id)
        || ($this->editPermission == 'both' && user()->id == $this->letter->job->recruiter_id)
        || $this->jobOffer->added_by == user()->id));

        $this->jobs = RecruitJob::all();
        $this->applications = RecruitJobApplication::where('job_id', $this->jobOffer->job_id)->get();

        if (request()->ajax()) {
            $html = view('recruit::jobs.ajax.editOfferLetter', $this->data)->render();
            return Reply::dataOnly(['status' => 'success', 'html' => $html, 'title' => $this->pageTitle]);
        }

        $this->view = 'recruit::jobs.ajax.editOfferLetter';

        return view('recruit::jobs.createOfferLetter', $this->data);
    }

    public function update(StoreOfferLetter $request, $id)
    {
        $jobOffer = RecruitJobOfferLetter::findOrFail($id);
        $this->letter = RecruitJobOfferLetter::with('job')->findOrFail($id);

        $this->editPermission = user()->permission('edit_offer_letter');
        abort_403(!($this->editPermission == 'all'
            || ($this->editPermission == 'added' && $jobOffer->added_by == user()->id)
            || ($this->editPermission == 'owned' && user()->id == $this->letter->job->recruiter_id)
            || ($this->editPermission == 'both' && user()->id == $this->letter->job->recruiter_id)
            || $jobOffer->added_by == user()->id));

        $jobOffer->job_app_id = $request->jobApplicant;
        $jobOffer->job_id = $request->jobId;


        $jobOffer->job_expire = Carbon::parse($request->jobExpireDate)->format('Y-m-d');
        $jobOffer->expected_joining_date = Carbon::parse($request->expected_joining_date)->format('Y-m-d');

        $jobOffer->comp_amount = $request->comp_amount;
        $jobOffer->pay_according = $request->pay_according;
        $jobOffer->sign_require = 'on';
        $jobOffer->status = $request->status;

        $jobOffer->save();

        return Reply::successWithData(__('recruit::modules.message.updateSuccess'), ['redirectUrl' => route('job-offer-letter.index'),'application_id' => $jobOffer->id]);
    }

    public function destroy($id)
    {
        $job = RecruitJobOfferLetter::findOrFail($id);
        $this->letter = RecruitJobOfferLetter::with('job')->findOrFail($id);

        $this->deletePermission = user()->permission('delete_offer_letter');
        abort_403(!($this->deletePermission == 'all'
            || ($this->deletePermission == 'added' && $job->added_by == user()->id)
            || ($this->deletePermission == 'owned' && user()->id == $this->letter->job->recruiter_id)
            || ($this->deletePermission == 'both' && user()->id == $this->letter->job->recruiter_id)
            || $job->added_by == user()->id));

        $job->delete();

        return Reply::successWithData(__('recruit::modules.message.deleteSuccess'), ['redirectUrl' => route('job-offer-letter.index')]);
    }

    public function sendOffer(Request $request)
    {
        $jobOffer = RecruitJobOfferLetter::findOrFail($request->jobOfferId);
        event(new OfferLetterEvent($jobOffer));
        $jobOffer->status = 'pending';
        $jobOffer->save();

        return Reply::successWithData(__('recruit::modules.message.mailsent'), ['redirectUrl' => route('job-offer-letter.index')]);
    }

    public function withdrawOffer(Request $request)
    {
        $jobOffer = RecruitJobOfferLetter::findOrFail($request->id);
        $jobOffer->status = 'withdraw';
        $jobOffer->save();

        return Reply::successWithData(__('recruit::modules.message.withdraw'), ['redirectUrl' => route('job-offer-letter.index')]);
    }

    public function fetchApplication(Request $request)
    {
        $data = RecruitJobApplication::where('job_id', $request->job_id)->get();
        $jobData = RecruitJob::where('id', $request->job_id)->first();

        $jobId = $request->job_id;
        $dataStage = RecruitJob::with('stages')->findOrFail($jobId);
        $dataStage = $dataStage->stages->pluck('name', 'id')->toArray();

        return Reply::dataOnly(['status' => 'success','stages' => $dataStage, 'applications' => $data, 'job' => $jobData, 'id' => $request->job_id]);
    }

    public function applyQuickAction(Request $request)
    {
        switch ($request->action_type) {
        case 'delete':
            $this->deleteRecords($request);
            return Reply::success(__('messages.deleteSuccess'));
        case 'change-status':
            $this->changeStatus($request);
            return Reply::success(__('messages.statusUpdatedSuccessfully'));
        default:
            return Reply::error(__('messages.selectAction'));
        }
    }

    protected function deleteRecords($request)
    {
        abort_403(user()->permission('delete_offer_letter') != 'all');
        RecruitJobOfferLetter::whereIn('id', explode(',', $request->row_ids))->delete();
        return true;
    }

    protected function changeStatus($request)
    {
        abort_403(user()->permission('edit_offer_letter') != 'all');
        RecruitJobOfferLetter::whereIn('id', explode(',', $request->row_ids))->update(['status' => $request->status]);
        return true;
    }

    public function changeLetterStatus(Request $request)
    {
        abort_403(user()->permission('edit_offer_letter') != 'all');
        $letterId = $request->letterId;
        $status = $request->status;
        $letterStatus = RecruitJobOfferLetter::findOrFail($letterId);
        $letterStatus->status = $status;
        $letterStatus->save();

        return Reply::success(__('messages.updateSuccess'));
    }

    public function createEmployee($id)
    {
        $addPermission = user()->permission('add_employees');
        abort_403(!in_array($addPermission, ['all', 'added']));
        $this->lastEmployeeID = EmployeeDetails::max('id');
        $this->designations = Designation::allDesignations();
        $this->teams = Team::all();
        $this->employees = User::allEmployees(null, true);
        $this->offerLetter = RecruitJobOfferLetter::with('jobApplication', 'jobApplication.job')->findOrFail($id);
        $this->countries = countries();

        return view('recruit::jobs.offer-letter.create_employee', $this->data);
    }

    public function employeeStore(StoreRequest $request)
    {
        $addPermission = user()->permission('add_employees');
        abort_403(!in_array($addPermission, ['all', 'added']));

        DB::beginTransaction();
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->mobile = $request->mobile;
            $user->country_id = $request->country;
            $user->save();

            if ($user->id) {
                $employee = new EmployeeDetails();
                $employee->user_id = $user->id;
                $employee->employee_id = $request->employee_id;
                $employee->joining_date = Carbon::createFromFormat($this->global->date_format, $request->joining_date)->format('Y-m-d');
                $employee->department_id = $request->department;
                $employee->designation_id = $request->designation;
                $employee->reporting_to = $request->reporting_to;
                $employee->save();
            }

            $employeeRole = Role::where('name', 'employee')->first();
            $user->attachRole($employeeRole);
            $user->assignUserRolePermission($employeeRole->id);
            $this->logSearchEntry($user->id, $user->name, 'employees.show', 'employee');

            if($request->has('offer_letter_id') && !is_null($request->offer_letter_id))
            {
                $offerLetter = RecruitJobOfferLetter::find($request->offer_letter_id);
                $offerLetter->employee_id = $user->id;
                $offerLetter->save();
            }

            // Commit Transaction
            DB::commit();

        } catch (\Swift_TransportException $e) {
            // Rollback Transaction
            DB::rollback();
            return Reply::error('Please configure SMTP details to add employee. Visit Settings -> notification setting to set smtp', 'smtp_error');
        } catch (\Exception $e) {
            // Rollback Transaction
            DB::rollback();
            return Reply::error('Some error occurred when inserting the data. Please try again or contact support');
        }

        return Reply::successWithData(__('messages.employeeAdded'), []);
    }

}
