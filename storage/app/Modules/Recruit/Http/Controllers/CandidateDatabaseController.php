<?php

namespace Modules\Recruit\Http\Controllers;

use App\Helper\Reply;
use Illuminate\Http\Request;
use App\Models\CompanyAddress;
use Modules\Recruit\Entities\RecruitJob;
use Modules\Recruit\Entities\RecruitSkill;
use Illuminate\Contracts\Support\Renderable;
use Modules\Recruit\Entities\RecruitJobSkill;
use App\Http\Controllers\AccountBaseController;
use Modules\Recruit\Entities\RecruitJobApplication;
use Modules\Recruit\Entities\RecruitCandidateDatabase;
use Modules\Recruit\DataTables\CandidateDatabaseDataTable;

class CandidateDatabaseController extends AccountBaseController
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = __('recruit::app.menu.candidatedatabase');
    }

    public function index(CandidateDatabaseDataTable $dataTable)
    {
        $viewPermission = user()->permission('view_job_application');
        abort_403(!in_array($viewPermission, ['all', 'added', 'owned']));

        $this->jobs = RecruitJob::all();
        $this->locations = CompanyAddress::all();
        $this->skills = RecruitSkill::all();
        $this->names = RecruitCandidateDatabase::get(['name','id']);

        return $dataTable->render('recruit::candidate-database.index', $this->data);
    }

    public function store(Request $request)
    {
        $application = RecruitJobApplication::with('job')->find($request->row_id);
        $skillsdata = RecruitJobSkill::where('job_id', $application->job->id)->get('skill_id');
        $applicant_skills = array();

        foreach ($skillsdata as $skills) {
            $applicant_skill = RecruitSkill::where('id', $skills->skill_id)->select('id')->get();
            $applicant_skills[] = $applicant_skill[0]['id'];
        }

        $jobArchive = new RecruitCandidateDatabase();

        $jobArchive->name = $application->full_name;
        $jobArchive->job_id = $application->job->id;
        $jobArchive->location_id = $application->location_id;
        $jobArchive->job_applied_on = $application->created_at;
        $jobArchive->skills = $applicant_skills;
        $jobArchive->job_application_id = $request->row_id;

        $jobArchive->save();

        RecruitJobApplication::destroy($request->row_id);

        return Reply::successWithData(__('recruit::messages.archiveSuccess'), ['status' => 'success']);
    }

    public function show($id)
    {
        $viewPermission = user()->permission('view_job_application');
        abort_403(!in_array($viewPermission, ['all', 'added', 'owned']));
        $model = new RecruitCandidateDatabase();
        $model = $model->select('recruit_candidate_database.*', 'recruit_jobs.title as job', 'company_addresses.location')->where('recruit_candidate_database.id', $id);
        $model = $model->leftJoin('recruit_jobs', 'recruit_jobs.id', '=', 'recruit_candidate_database.job_id')
            ->leftJoin('company_addresses', 'company_addresses.id', '=', 'recruit_candidate_database.location_id')
            ->groupBy('recruit_candidate_database.id')->get();

        $this->application = $model;
        $this->skills = RecruitSkill::whereIn('id', $this->application[0]->skills)->select('name')->get();

        if (request()->ajax()) {
            if (request('json') == true) {
                $html = view('recruit::candidate-database.ajax.show', $this->data)->render();
                return Reply::dataOnly(['status' => 'success', 'html' => $html, 'title' => $this->pageTitle]);
            }

            $html = view('recruit::candidate-database.ajax.show', $this->data)->render();
            return Reply::dataOnly(['status' => 'success', 'html' => $html, 'title' => $this->pageTitle]);
        }

        $this->view = 'recruit::candidate-database.ajax.show';
        return view('recruit::candidate-database.show', $this->data);
    }

    public function update(Request $request, $id)
    {
        $restoreAccount = RecruitJobApplication::withTrashed()->find($request->job_app_id);
        $restoreAccount->deleted_at = null;
        $restoreAccount->save();
        RecruitCandidateDatabase::destroy($id);
        return Reply::successWithData(__('recruit::messages.retriveSuccess'), ['status' => 'success']);
    }
    
}
