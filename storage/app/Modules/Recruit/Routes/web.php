<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use Modules\Recruit\Http\Controllers\JobController;
use Modules\Recruit\Http\Controllers\SkillController;
use Modules\Recruit\Http\Controllers\ReportController;
use Modules\Recruit\Http\Controllers\JobFileController;
use Modules\Recruit\Http\Controllers\JobTypeController;
use Modules\Recruit\Http\Controllers\EvaluationController;
use Modules\Recruit\Http\Controllers\FooterLinksController;
use Modules\Recruit\Http\Controllers\ApplicantNoteController;
use Modules\Recruit\Http\Controllers\InterviewFileController;
use Modules\Recruit\Http\Controllers\Front\FrontJobController;
use Modules\Recruit\Http\Controllers\JobApplicationController;
use Modules\Recruit\Http\Controllers\JobOfferLetterController;
use Modules\Recruit\Http\Controllers\RecruitSettingController;
use Modules\Recruit\Http\Controllers\WorkExperienceController;
use Modules\Recruit\Http\Controllers\RecruitDashboardController;
use Modules\Recruit\Http\Controllers\CandidateDatabaseController;
use Modules\Recruit\Http\Controllers\FooterSettingsController;
use Modules\Recruit\Http\Controllers\InterviewScheduleController;
use Modules\Recruit\Http\Controllers\JobApplicationBoardController;
use Modules\Recruit\Http\Controllers\JobApplicationFilesController;
use Modules\Recruit\Http\Controllers\JobOfferLetterFilesController;
use Modules\Recruit\Http\Controllers\InterviewRecommendationStatusController;
use Modules\Recruit\Http\Controllers\InterviewStageController;
use Modules\Recruit\Http\Controllers\RecruitEmailNotificationSettingsController;
use Modules\Recruit\Http\Controllers\RecruiterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('careers', [FrontJobController::class, 'index'])->name('recruit');
Route::get('job-opening', [FrontJobController::class, 'jobOpenings'])->name('job_opening');
Route::get('job-apply/{slug}/{location?}', [FrontJobController::class, 'jobApply'])->name('job_apply');
Route::post('save-application', [FrontJobController::class, 'saveApplication'])->name('save_application');
Route::get('job-detail/{jobId}/{locationId}', [FrontJobController::class, 'jobDetail'])->name('job-detail');
Route::get('/jobOffer/{hash}', [FrontJobController::class, 'jobOfferLetter'])->name('front.jobOffer');
Route::get('job-offer-download/{id}', [FrontJobController::class, 'download'])->name('jobOffer.download');
Route::post('/jobOffer-accept/{id}', [FrontJobController::class, 'jobOfferLetterStatusChange'])->name('front.job-offer.accept');
Route::get('/thankyou', [FrontJobController::class,'thankyouPage'])->name('front.thankyou-page');
Route::get('/{slug}', [FrontJobController::class,'customPage'])->name('front.customPage');

Route::group(['middleware' => 'auth', 'prefix' => 'account'], function () {
    Route::post('jobs/apply-quick-action', [JobController::class, 'applyQuickAction'])->name('jobs.apply_quick_action');

    Route::get('jobs/fetch-job', [JobController::class, 'fetchJob'])->name('jobs.fetch_job');
    Route::get('jobs/addRecruiter', [RecruiterController::class, 'addRecruiter'])->name('jobs.addRecruiter');
    Route::post('jobs/change-status', [JobController::class, 'changeJobStatus'])->name('jobs.change_job_status');
    Route::resource('interview-stages', InterviewStageController::class);
    Route::resource('jobs', JobController::class);

    Route::resource('work-experience', WorkExperienceController::class);
    Route::resource('job-type', JobTypeController::class);
    Route::get('job-offer-letter/fetch-applications', [JobOfferLetterController::class, 'fetchApplication'])->name('job-offer-letter.fetch-job-application');
    Route::post('job-offer-letter/send-offer-letter', [JobOfferLetterController::class, 'sendOffer'])->name('job-offer-letter.send-offer-letter');
    Route::post('job-offer-letter/withdraw-offer-letter', [JobOfferLetterController::class, 'withdrawOffer'])->name('job-offer-letter.withdraw-offer-letter');

    Route::post('job-offer-letter/apply-quick-action', [JobOfferLetterController::class, 'applyQuickAction'])->name('job-offer-letter.apply_quick_action');
    Route::post('job-offer-letter/change-status', [JobOfferLetterController::class, 'changeLetterStatus'])->name('job-offer-letter.change_letter_status');

    Route::get('job-offer-letter/create-employee/{id}', [JobOfferLetterController::class, 'createEmployee'])->name('job-offer-letter.create_employee');
    Route::post('job-offer-letter/employee-store', [JobOfferLetterController::class, 'employeeStore'])->name('job-offer-letter.employee-store');

    Route::resource('job-offer-letter', JobOfferLetterController::class);

    Route::resource('job-offer-file', JobOfferLetterFilesController::class);
    Route::get('job-offer-file/download/{id}', [JobOfferLetterFilesController::class, 'download'])->name('job-offer-file.download');

    Route::post('job-skills/apply-quick-action', [SkillController::class, 'applyQuickAction'])->name('job-skills.apply_quick_action');
    Route::get('job-skills/addSkill', [SkillController::class, 'addSkill'])->name('job-skills.addSkill');
    Route::post('job-skills/storeSkill', [SkillController::class, 'storeSkill'])->name('job-skills.storeSkill');
    Route::post('job-skills/updateSkill/{id?}', [SkillController::class, 'updateSkill'])->name('job-skills.updateSkill');
    Route::resource('job-skills', SkillController::class);

    Route::post('job-appboard/updateIndex', [JobApplicationBoardController::class, 'updateIndex'])->name('job-appboard.update_index');
    Route::post('job-appboard/add-status', [JobApplicationBoardController::class, 'addStatus'])->name('job-appboard.add-status');
    Route::post('job-appboard/add-skills', [JobApplicationBoardController::class, 'addSkill'])->name('job-appboard.add-skills');
    Route::post('job-appboard/store-status', [JobApplicationBoardController::class, 'storeStatus'])->name('job-appboard.store-status');
    Route::post('job-appboard/collapseColumn', [JobApplicationBoardController::class, 'collapseColumn'])->name('job-appboard.collapse_column');
    Route::get('job-appboard/loadMore', [JobApplicationBoardController::class, 'loadMore'])->name('job-appboard.load_more');
    Route::get('job-appboard/application-remark/{id}', [JobApplicationBoardController::class, 'applicationRemark'])->name('job-appboard.application_remark');
    Route::post('job-appboard/application-remark-store', [JobApplicationBoardController::class, 'applicationRemarkStore'])->name('job-appboard.application_remark_store');
    Route::get('job-appboard/interview/{id}', [JobApplicationBoardController::class, 'interview'])->name('job-appboard.interview');
    Route::post('job-appboard/interview-store', [JobApplicationBoardController::class, 'interviewStore'])->name('job-appboard.interview_store');
    Route::get('job-appboard/offer-letter/{id}', [JobApplicationBoardController::class, 'offerLetter'])->name('job-appboard.offer_letter');
    Route::post('job-appboard/offer-letter-store', [JobApplicationBoardController::class, 'offerLetterStore'])->name('job-appboard.offer_letter_store');

    Route::resource('job-appboard', JobApplicationBoardController::class);

    Route::resource('applicant-note', ApplicantNoteController::class);

    Route::get('job-files/download/{id}', [JobFileController::class, 'download'])->name('job_files.download');
    Route::resource('job-files', JobFileController::class);

    // Job application
    Route::post('job-applications/change-status', [JobApplicationController::class, 'changeStatus'])->name('job-applications.change_status');

    Route::post('job-applications/apply-quick-action', [JobApplicationController::class, 'applyQuickAction'])->name('job-applications.apply_quick_action');
    Route::get('job-application/location', [JobApplicationController::class, 'getLocation'])->name('job-applications.get_location');
    Route::resource('job-applications', JobApplicationController::class);

    Route::get('application-file/download/{id}', [JobApplicationFilesController::class, 'download'])->name('application-file.download');
    Route::resource('application-file', JobApplicationFilesController::class);
    // Footer links
    Route::resource('footer-links', FooterLinksController::class);
    Route::post('footer-settings/change-status/{id}', [FooterSettingsController::class, 'changeStatus'])->name('footer-settings.change_status');
    Route::resource('footer-settings', FooterSettingsController::class);
    Route::post('footer-links/change-status', [FooterLinksController::class, 'changeStatus'])->name('footer-links.change_status');
    Route::post('footer-links/apply-quick-action', [FooterLinksController::class, 'applyQuickAction'])->name('footer-links.apply_quick_action');
    // Interview schedule
    Route::post('interview-schedule/change-status', [InterviewScheduleController::class, 'changeInterviewStatus'])->name('interview-schedule.change_interview_status');
    Route::post('interview-schedule/apply-quick-action', [InterviewScheduleController::class, 'applyQuickAction'])->name('interview-schedule.apply_quick_action');

    // Candidate Database
    Route::resource('candidate-database', CandidateDatabaseController::class);

    // Report
    Route::post('report-chart', [ReportController::class, 'reportChartData'])->name('jobreport.chart');
    Route::resource('recruit-job-report', ReportController::class);

    // Interview schedule
    Route::post('interview-schedule/update-occurrence/{id}', [InterviewScheduleController::class, 'updateOccurrence'])->name('interview-schedule.update_occurrence');

    Route::post('interview-schedule/apply-quick-action', [InterviewScheduleController::class, 'applyQuickAction'])->name('interview-schedule.apply_quick_action');

    Route::get('interview-schedule/table-view', [InterviewScheduleController::class, 'tableView'])->name('interview-schedule.table_view');

    Route::get('interview-files/download/{id}', [InterviewFileController::class, 'download'])->name('interview_files.download');
    Route::resource('interview-files', InterviewFileController::class);

    Route::resource('evaluation', EvaluationController::class);
    Route::resource('recommendation-status', InterviewRecommendationStatusController::class);

    Route::get('interview-schedule/reschedule', [InterviewScheduleController::class, 'reschedule'])->name('interview-schedule.reschedule');
    Route::post('interview-schedule/reschedule/store', [InterviewScheduleController::class, 'rescheduleStore'])->name('interview-schedule.reschedule.store');

    Route::get('interview-schedule/response/{id}/{type}', [InterviewScheduleController::class,'employeeResponse'])->name('interview-schedule.response');
    Route::post('interview-schedule/employee-response', [InterviewScheduleController::class, 'response'])->name('interview-schedule.employee_response');

    Route::resource('interview-schedule', InterviewScheduleController::class);
    Route::resource('notification-settings', RecruitEmailNotificationSettingsController::class);
    // Dashboard
    Route::resource('recruit-dashboard', RecruitDashboardController::class);

    Route::resource('recruit-settings', RecruitSettingController::class);
    Route::resource('recruiter', RecruiterController::class);
});
