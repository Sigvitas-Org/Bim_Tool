<?php

namespace Modules\Recruit\Http\Controllers;

use App\Models\Team;
use App\Helper\Files;
use App\Helper\Reply;
use Illuminate\Http\Request;
use App\Models\CompanyAddress;
use Modules\Recruit\Entities\RecruitJob;
use Modules\Recruit\Entities\RecruitSkill;
use Modules\Recruit\Entities\RecruitSetting;
use App\Http\Controllers\AccountBaseController;
use Carbon\Carbon;
use Modules\Recruit\Entities\ApplicationSource;
use Modules\Recruit\Entities\RecruitJobApplication;
use Modules\Recruit\Entities\RecruitApplicationFile;
use Modules\Recruit\Entities\RecruitApplicationSkill;
use Modules\Recruit\Entities\RecruitApplicationStatus;
use Modules\Recruit\DataTables\JobApplicationsDataTable;
use Modules\Recruit\Entities\RecruitInterviewSchedule;
use Modules\Recruit\Entities\RecruitJobAddress;
use Modules\Recruit\Events\JobApplicationStatusChangeEvent;
use Modules\Recruit\Http\Requests\JobApplication\StoreJobApplication;
use Modules\Recruit\Http\Requests\JobApplication\UpdateJobApplication;
use PhpParser\Node\Expr\Empty_;

class JobApplicationController extends AccountBaseController
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = __('recruit::app.menu.jobApplication');
    }

    public function index(JobApplicationsDataTable $dataTable)
    {
        $viewPermission = user()->permission('view_job_application');
        abort_403(!in_array($viewPermission, ['all', 'added', 'owned', 'both']));

        $this->jobs = RecruitJob::all();
        $this->locations = CompanyAddress::all();
        $this->applicationStatus = RecruitApplicationStatus::all();
        $this->currentLocations = RecruitJobApplication::select('current_location')->where('current_location', '!=', null)->distinct()->get();

        return $dataTable->render('recruit::job-applications.table', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $addPermission = user()->permission('add_job_application');
        abort_403(!in_array($addPermission, ['all', 'added']));
        $this->jobId = request()->id;
        $this->pageTitle = __('recruit::modules.jobApplication.addJobApplications');

        $this->applicationStatus = RecruitApplicationStatus::select('id', 'status', 'position', 'color')->orderBy('position')->get();
        $this->applicationSources = ApplicationSource::all();
        $this->jobs = RecruitJob::where('status', 'open')->get();
        $this->locations = CompanyAddress::all();
        $this->jobLocations = RecruitJobAddress::with('location')->where('job_id', request()->id)->get();
        $this->jobApp = RecruitJob::where('id', request()->id)->first();

        if (request()->ajax()) {
            $html = view('recruit::job-applications.ajax.create', $this->data)->render();
            return Reply::dataOnly(['status' => 'success', 'html' => $html, 'title' => $this->pageTitle]);
        }

        $this->view = 'recruit::job-applications.ajax.create';

        return view('recruit::job-applications.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StoreJobApplication $request)
    {
        $addPermission = user()->permission('add_job_application');
        abort_403(!in_array($addPermission, ['all', 'added']));
        $jobApplications = RecruitJobApplication::where('job_id', $request->job_id)->get();
        $jobApp = new RecruitJobApplication();
        $jobApp->job_id = $request->job_id;
        $jobApp->full_name = $request->full_name;

        if (count($jobApplications) > 0) {
            foreach ($jobApplications as $job){
                $mail = $job->whereNotNull('email')->pluck('email')->toArray();
            }

            if (in_array($request->email, $mail)){
                $this->validate($request, [
                    'email' => 'unique:recruit_job_applications|email'
                ]);
            }
            else {
                $jobApp->email = $request->email;
            }
        }
        else{
            $jobApp->email = $request->email;
        }

        $jobApp->phone = $request->phone;

        if ($request->has('gender')) {
            $jobApp->gender = $request->gender;
        }

        if($request->date_of_birth != null){
            if ($request->has('date_of_birth')) {
                $date_of_birth = Carbon::createFromFormat($this->global->date_format, $request->date_of_birth)->format('Y-m-d');
                $jobApp->date_of_birth = $date_of_birth;
            }
        }

        $jobApp->source_id = $request->source;
        $jobApp->cover_letter = $request->cover_letter;
        $jobApp->location_id = $request->location_id;
        $jobApp->total_experience = $request->total_experience;
        $jobApp->current_location = $request->current_location;
        $jobApp->current_ctc = $request->current_ctc;
        $jobApp->expected_ctc = $request->expected_ctc;
        $jobApp->notice_period = $request->notice_period;
        $jobApp->status_id = $request->status_id;
        $jobApp->application_sources = 'addedByUser';
        $jobApp->column_priority = 0;

        if ($request->hasFile('photo')) {
            Files::deleteFile($jobApp->image, 'avatar');
            $jobApp->photo = Files::upload($request->photo, 'avatar', 300);
        }

        $jobApp->save();

        if (request()->hasFile('resume')) {
            $file = new RecruitApplicationFile();
            $file->application_id = $jobApp->id;
            Files::deleteFile($jobApp->resume, 'application-files/');
            $filename = Files::uploadLocalOrS3(request()->resume, 'application-files/' . $jobApp->id);
            $file->filename = request()->resume->getClientOriginalName();
            $file->hashname = $filename;
            $file->size = request()->resume->getSize();
            $file->save();
        }

        if (request()->add_more == 'true') {
            $html = $this->create();
            return Reply::successWithData(__('recruit::messages.applicationAdded'), ['html' => $html, 'add_more' => true]);
        }

        $redirectUrl = urldecode($request->redirect_url);

        if ($redirectUrl == '') {
            $redirectUrl = route('job-applications.index');
        }

        return Reply::dataOnly(['redirectUrl' => $redirectUrl,'application_id' => $jobApp->id]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $interviewer = [];
        $this->application = RecruitJobApplication::with('job', 'applicationStatus', 'comments', 'comments.user', 'files')->find($id);
        $scheduleData = RecruitInterviewSchedule::with('employees')->where('job_application_id', $id)->first();

        if ($scheduleData) {
            $interviewer = $scheduleData->employees->pluck('id')->toArray();
        }

        $this->viewPermission = user()->permission('view_job_application');
        abort_403(!($this->viewPermission == 'all'
            || ($this->viewPermission == 'added' && $this->application->added_by == user()->id)
            || ($this->viewPermission == 'owned' && user()->id == $this->application->job->recruiter_id)
            || ($this->viewPermission == 'owned' && in_array(user()->id, $interviewer))
            || ($this->viewPermission == 'both' && user()->id == $this->application->job->recruiter_id
            || $this->application->added_by == user()->id) || (in_array(user()->id, $interviewer))));
        $this->departments = Team::all();
        $this->recruit_skills = RecruitApplicationSkill::where('application_id', $id)->get();

        $this->selected_skills = $this->recruit_skills->pluck('skill_id')->toArray();
        $this->skills = RecruitSkill::select('id', 'name')->get();

        $tab = request('view');

        switch ($tab) {
        case 'applicant_notes':
            $this->tab = 'recruit::job-applications.notes.notes';
            break;
        case 'resume':
            $this->tab = 'recruit::job-applications.ajax.resume';
            break;
        default:
            $this->tab = 'recruit::job-applications.ajax.skill';
            break;
        }

        if (request()->ajax()) {
            if (request('json') == true) {
                $html = view($this->tab, $this->data)->render();
                return Reply::dataOnly(['status' => 'success', 'html' => $html, 'title' => $this->pageTitle]);
            }

            $html = view('recruit::job-applications.ajax.show', $this->data)->render();
            return Reply::dataOnly(['status' => 'success', 'html' => $html, 'title' => $this->pageTitle]);
        }

        $this->view = 'recruit::job-applications.ajax.show';

        return view('recruit::job-applications.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $this->jobApplication = RecruitJobApplication::findOrFail($id);
        $this->job = RecruitJob::where('id', $this->jobApplication->job_id)->get();

        $this->editPermission = user()->permission('edit_job_application');
        abort_403(!($this->editPermission == 'all'
            || ($this->editPermission == 'added' && $this->jobApplication->added_by == user()->id)
            || ($this->editPermission == 'owned' && user()->id == $this->job->recruiter_id)
            || ($this->editPermission == 'both' && user()->id == $this->job->recruiter_id)
            || $this->jobApplication->added_by == user()->id));

        $this->jobApplictionFile = RecruitApplicationFile::where('application_id', $id)->first();
        $this->jobs = RecruitJob::all();
        $this->applicationSources = ApplicationSource::all();
        $this->locations = CompanyAddress::all();
        $this->applicationStatus = RecruitApplicationStatus::select('id', 'status', 'position', 'color')->orderBy('position')->get();

        if (request()->ajax()) {
            $html = view('recruit::job-applications.ajax.edit', $this->data)->render();
            return Reply::dataOnly(['status' => 'success', 'html' => $html, 'title' => $this->pageTitle]);
        }

        $this->view = 'recruit::job-applications.ajax.edit';

        return view('recruit::job-applications.create', $this->data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateJobApplication $request, $id)
    {
        $this->editPermission = user()->permission('edit_job_application');
        $jobApp = RecruitJobApplication::with('job')->findOrFail($id);

        abort_403(!($this->editPermission == 'all'
            || ($this->editPermission == 'added' && $jobApp->added_by == user()->id)
            || ($this->editPermission == 'owned' && user()->id == $jobApp->job->recruiter_id)
            || ($this->editPermission == 'both' && user()->id == $jobApp->job->recruiter_id)
            || $jobApp->added_by == user()->id));

        $status = $jobApp->status_id;
        $statusId = $request->status_id;
        $jobApp->job_id = $request->job_id;
        $jobApp->full_name = $request->full_name;
        $jobApp->email = $request->email;
        $jobApp->phone = $request->phone;
        $jobApp->location_id = $request->location_id;
        $jobApp->total_experience = $request->total_experience;
        $jobApp->current_location = $request->current_location;
        $jobApp->current_ctc = $request->current_ctc;
        $jobApp->expected_ctc = $request->expected_ctc;
        $jobApp->notice_period = $request->notice_period;

        if ($request->has('gender')) {
            $jobApp->gender = $request->gender;
        }

        if($request->date_of_birth != null){
            if ($request->has('date_of_birth')) {
                $date_of_birth = Carbon::createFromFormat($this->global->date_format, $request->date_of_birth)->format('Y-m-d');
                $jobApp->date_of_birth = $date_of_birth;
            }
        }

        $jobApp->status_id = $request->status_id;
        $jobApp->source_id = $request->source;
        $jobApp->cover_letter = $request->cover_letter;

        if ($request->photo_delete == 'yes') {
            Files::deleteFile($jobApp->photo, 'avatar');
            $jobApp->photo = null;
        }

        if ($request->hasFile('photo')) {
            Files::deleteFile($jobApp->photo, 'avatar');
            $jobApp->photo = Files::upload($request->photo, 'avatar', 300);
        }

        $jobApp->save();

        if (request()->hasFile('resume')) {
            $file = RecruitApplicationFile::where('application_id', $jobApp->id)->first();
            $file->application_id = $jobApp->id;
            Files::deleteFile($file->application_id, 'application-files/'. $jobApp->id);
            $filename = Files::uploadLocalOrS3(request()->resume, 'application-files/' . $jobApp->id);
            $file->filename = request()->resume->getClientOriginalName();
            $file->hashname = $filename;
            $file->size = request()->resume->getSize();
            $file->save();
        }

        if ($status != $statusId) {
            $send = $this->statusForMailSend($statusId);

            if ($send == true) {
                event(new JobApplicationStatusChangeEvent($jobApp));
            }
        }

        return Reply::successWithData(__('recruit::modules.message.updateSuccess'), ['redirectUrl' => route('job-applications.index'),'application_id' => $jobApp->id]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $jobApp = RecruitJobApplication::with('job')->findOrFail($id);

        $this->deletePermission = user()->permission('delete_job_application');
        abort_403(!($this->deletePermission == 'all'
            || ($this->deletePermission == 'added' && $jobApp->added_by == user()->id)
            || ($this->deletePermission == 'owned' && user()->id == $jobApp->job->recruiter_id)
            || ($this->deletePermission == 'both' && user()->id == $jobApp->job->recruiter_id)
            || $jobApp->added_by == user()->id));

        RecruitJobApplication::withTrashed()->find($id)->forceDelete();

        return Reply::successWithData(__('recruit::modules.message.deleteSuccess'), ['redirectUrl' => route('job-applications.index')]);
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
        abort_403(user()->permission('delete_job_application') != 'all');

        RecruitJobApplication::withTrashed()->whereIn('id', explode(',', $request->row_ids))->forceDelete();
        return true;
    }

    public function changeStatus(Request $request)
    {
        abort_403(user()->permission('edit_job_application') != 'all');
        $interviewPermission = user()->permission('add_interview_schedule');
        $offerLetterPermission = user()->permission('add_offer_letter');
        $status = RecruitApplicationStatus::where('id', $request->status)->first();
        $statusId = $request->status;
        $send = $this->statusForMailSend($statusId);
        $sendMail = RecruitJobApplication::whereIn('id', explode(',', $request->row_ids))->first()->update(['status_id' => $request->status]);
        $mail = RecruitJobApplication::find($request->row_ids);

        if ($send == true) {
            event(new JobApplicationStatusChangeEvent($mail));
        }

        return Reply::dataOnly(['status' => 'success', 'status' => $status, 'interviewPermission' => $interviewPermission, 'offerLetterPermission' => $offerLetterPermission]);
    }

    public function statusForMailSend($id)
    {
        $settings = RecruitSetting::first();
        $mail = $settings->mail_setting;
        $len = count($mail);

        for ($mail_index = 1; $mail_index < $len; $mail_index++) {
            if (in_array($mail_index, $mail)){
                if ($mail[$mail_index]['id'] == $id && $mail[$mail_index]['status'] == true) {
                    return true;
                }
            }
        }
    }

    public function getLocation(Request $request)
    {
        $this->data = RecruitJob::with('address')->findOrFail($request->job_id);
        $this->locations = RecruitJobAddress::with('location')->where('job_id', $request->job_id)->get();
        $view = view('recruit::job-applications.location', $this->data)->render();
        $job = RecruitJob::findOrFail($request->job_id);
        return Reply::dataOnly(['status' => 'success', 'locations' => $view, 'job' => $job, 'id' => $request->job_id]);
    }
    
}
