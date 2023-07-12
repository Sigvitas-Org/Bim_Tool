<?php

namespace Modules\Recruit\Http\Controllers;

use App\Http\Controllers\AccountBaseController;
use Carbon\Carbon;
use DB;
use Illuminate\Contracts\Support\Renderable;
use Modules\Recruit\Entities\RecruitApplicationStatus;
use Modules\Recruit\Entities\RecruitInterviewSchedule;
use Modules\Recruit\Entities\RecruitJob;
use Modules\Recruit\Entities\RecruitJobApplication;

class RecruitDashboardController extends AccountBaseController
{

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = __('recruit::app.menu.dashboard');
    }

    public function index()
    {
        $this->loggedEmployee = user();

        $this->startDate  = (request('startDate') != '') ? Carbon::createFromFormat($this->global->date_format, request('startDate')) : now($this->global->timezone)->startOfMonth();

        $this->endDate = (request('endDate') != '') ? Carbon::createFromFormat($this->global->date_format, request('endDate')) : now($this->global->timezone);

        $startDate = $this->startDate->toDateString();
        $endDate = $this->endDate->toDateString();

        $this->totalOpenings = RecruitJob::where('status', 'open')
            ->where('start_date', '<=', now()->format('Y-m-d'))
            ->where('end_date', '>=', now()->format('Y-m-d'))
            ->orWhere('end_date', '=', null)
            ->count();
        $this->totalApplications = RecruitJobApplication::count();

        $this->totalHired = RecruitJobApplication::join('recruit_application_status', 'recruit_application_status.id', '=', 'recruit_job_applications.status_id')
            ->where('recruit_application_status.status', 'hired')
            ->count();
        $this->totalRejected = RecruitJobApplication::join('recruit_application_status', 'recruit_application_status.id', '=', 'recruit_job_applications.status_id')
            ->where('recruit_application_status.status', 'rejected')
            ->count();
        $currentDate = now()->format('Y-m-d');

        $this->newApplications = RecruitJobApplication::where(DB::raw('DATE(`created_at`)'), $currentDate)->count();

        $this->shortlisted = RecruitJobApplication::join('recruit_application_status', 'recruit_application_status.id', '=', 'recruit_job_applications.status_id')
            ->where('recruit_application_status.status', 'phone screen')
            ->orWhere('recruit_application_status.status', 'interview')
            ->count();

        $this->totalTodayInterview = RecruitInterviewSchedule::where(DB::raw('DATE(`schedule_date`)'), $currentDate)
            ->count();

        $this->activeJobs = RecruitJob::with('recruiter')->where('status', 'open')->where(DB::raw('DATE(`end_date`)'), '>=', $currentDate)->orWhere('end_date', '=', null)->get();

        $this->todaysInterview = RecruitInterviewSchedule::with('employees', 'employeesData', 'jobApplication', 'jobApplication.job')->where(DB::raw('DATE(`schedule_date`)'), $currentDate)->get();
        $this->applicationSourceWise = $this->applicationChartData($startDate, $endDate);
        $this->candidateStatusWise = $this->candidateStatusChartData($startDate, $endDate);
        return view('recruit::dashboard.index', $this->data);
    }

    public function applicationChartData()
    {
        $labels = ['1', '2', '3', '4', '5'];
        $data['labels'] = [__('recruit::app.jobApplication.linkedin'),__('recruit::app.jobApplication.facebook'),__('recruit::app.jobApplication.instagram'),__('recruit::app.jobApplication.twitter'),__('recruit::app.jobApplication.other')];
        $data['colors'] = ['#0A66C2', '#1877f2', '#E4405F', '#1DA1F2', '#F57D00'];
        $data['values'] = [];

        foreach ($labels as $label) {
            $data['values'][] = RecruitJobApplication::where('source_id', $label)->count();
        }

        return $data;
    }

    public function candidateStatusChartData()
    {
        $allId = RecruitApplicationStatus::pluck('id')->toArray();
        $allStatus = RecruitApplicationStatus::pluck('status')->toArray();
        $allColors = RecruitApplicationStatus::pluck('color')->toArray();
        $labels = $allId;
        $data['colors'] = $allColors;
        $data['values'] = [];

        foreach ($allStatus as $key => $value) {
            $data['labels'][] = ucfirst($value);
        }

        foreach ($labels as $label) {
            $data['values'][] = RecruitJobApplication::with('applicationStatus')->where('status_id', $label)->count();
        }

        return $data;
    }
    
}
