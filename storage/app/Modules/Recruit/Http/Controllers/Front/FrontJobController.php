<?php

namespace Modules\Recruit\Http\Controllers\Front;

use Carbon\Carbon;
use App\Models\Team;
use App\Models\User;
use App\Helper\Files;
use App\Helper\Reply;
use Illuminate\Http\Request;
use App\Models\CompanyAddress;
use DB;
use Illuminate\Support\Facades\File;
use Modules\Recruit\Entities\RecruitJob;
use Illuminate\Support\Facades\Notification;
use Modules\Recruit\Entities\RecruitSetting;
use Modules\Recruit\Entities\ApplicationSource;
use Modules\Recruit\Entities\RecruitJobAddress;
use Modules\Recruit\Events\NewJobApplicationEvent;
use Modules\Recruit\Entities\RecruitJobApplication;
use Modules\Recruit\Entities\RecruitJobOfferLetter;
use Modules\Recruit\Entities\RecruitApplicationFile;
use Modules\Recruit\Entities\RecruitApplicationSkill;
use Modules\Recruit\Entities\RecruitFooterLink;
use Modules\Recruit\Entities\RecruitSkill;
use Modules\Recruit\Notifications\OfferLetterAccept;
use Modules\Recruit\Notifications\NewJobApplication;
use Modules\Recruit\Notifications\OfferLetterReject;
use Modules\Recruit\Events\JobOfferStatusChangeEvent;
use Modules\Recruit\Notifications\FrontJobApplyCandidate;
use Modules\Recruit\Http\Requests\Front\FrontJobApplication;

class FrontJobController extends FrontBaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = __('recruit::app.menu.recruit');
        $careerSite = RecruitSetting::select('career_site')->first();

        if ($careerSite->career_site != 'yes') {
            abort(404);
        }
    }

    public function index()
    {
        $this->address = CompanyAddress::all();
        $this->setting = RecruitSetting::first();
        return view('recruit::front.index', $this->data);
    }

    public function jobOpenings()
    {
        $this->jobs = RecruitJob::with('team', 'skills.skill')->where('status', 'open')->where('remaining_openings', '>', 0)->get();

        $this->locations = RecruitJobAddress::with('jobs', 'job.team', 'location')->whereHas('jobs', function ($q) {
            $q->where('status', '=', 'open')
                ->where('remaining_openings', '>', 0)
                ->where(
                    function($query) {
                        return $query
                            ->where(DB::raw('DATE(`end_date`)'), '>=', now()->format('Y-m-d'))
                            ->orWhere('end_date', '=', null);
                    });
        })->get();
        
        $this->firstJob = RecruitJob::with(['address', 'team', 'skills.skill'])->where(DB::raw('DATE(`end_date`)'), '>=', Carbon::now()->format('Y-m-d'))->orWhere('end_date', '=', null)->where('status', 'open')->where('remaining_openings', '>', 0)->first();
        $this->department = Team::all();
        $this->companyName = $this->global->company_name;
        return view('recruit::front.job-openings', $this->data);
    }

    public function jobApply($slug, $locationId)
    {
        $this->job = RecruitJob::with(['address' => function ($q) use ($locationId) {
            $q->where('id', $locationId)->get();
        }])->where('slug', $slug)->first();
        $this->skills = RecruitSkill::all();
        $this->recruitSetting = RecruitSetting::first();
        $this->applicationSources = ApplicationSource::all();
        return view('recruit::front.job-apply', $this->data);
    }

    public function jobDetail($jobId, $locationId)
    {
        $this->job = RecruitJob::with('address', 'skills.skill')->where('id', $jobId)
            ->where('status', 'open')
            ->first();
        $this->jobLocation = CompanyAddress::find($locationId);
        $view = view('recruit::front.job-detail', $this->data)->render();
        return Reply::dataOnly(['status' => 'success', 'data' => $this->data,'html' => $view]);
    }

    public function jobOfferLetterStatusChange(Request $request, $id)
    {
        $jobOffer = RecruitJobOfferLetter::findOrFail($id);
        $users = User::allAdmins();

        if ($request->status == 'accept') {
            if ($jobOffer->sign_require == 'on') {
                $image = $request->signature;  // your base64 encoded
                $image = str_replace('data:image/png;base64,', '', $image);
                $image = str_replace(' ', '+', $image);
                $imageName = str_random(32) . '.' . 'jpg';

                if (!File::exists(public_path('user-uploads/' . 'offer/accept'))) {
                    $result = File::makeDirectory(public_path('user-uploads/offer/accept'), 0775, true);
                }

                File::put(public_path() . '/user-uploads/offer/accept/' . $imageName, base64_decode($image));

                $jobOffer->sign_image = $imageName;
            }

            Notification::send($jobOffer->jobApplication, new OfferLetterAccept($jobOffer->job, $jobOffer->jobApplication));

            $jobOffer->ip_address = request()->ip();
            $jobOffer->offer_accept_at = now();
        }
        elseif ($request->status == 'decline') {
            $jobOffer->decline_reason = $request->reason;
            $jobOffer->ip_address = request()->ip();
            $jobOffer->offer_accept_at = now();

            Notification::send($jobOffer->jobApplication, new OfferLetterReject($jobOffer->job, $jobOffer->jobApplication));
        }

        $jobOffer->status = $request->status;
        $jobOffer->save();

        event(new JobOfferStatusChangeEvent($jobOffer, $users));

        return Reply::dataOnly(['status' => 'success']);
    }

    public function jobOfferLetter($hash)
    {
        $this->jobOffer = RecruitJobOfferLetter::where('hash', $hash)->firstOrFail();
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

        return view('recruit::jobs.offer-letter-preview', $this->data);
    }

    /**
     * @param FrontJobApplication $request
     * @return mixed
     */
    public function saveApplication(FrontJobApplication $request)
    {
        $jobApplication = new RecruitJobApplication();
        $jobApplication->full_name = $request->full_name;
        $jobApplication->job_id = $request->job_id;
        $jobApplication->location_id = $request->location_id;
        $jobApplication->status_id = 1;
        $jobApplication->email = $request->email;
        $jobApplication->source_id = $request->source;
        $jobApplication->phone = $request->phone;
        $jobApplication->application_sources = 'careerWebsite';
        $jobApplication->cover_letter = $request->cover_letter;
        $jobApplication->column_priority = 0;
        $jobApplication->total_experience = $request->total_experience;
        $jobApplication->current_location = $request->current_location;
        $jobApplication->current_ctc = $request->current_ctc;
        $jobApplication->expected_ctc = $request->expected_ctc;
        $jobApplication->notice_period = $request->notice_period;

        if ($request->hasFile('photo')) {
            Files::deleteFile($jobApplication->image, 'avatar');
            $jobApplication->photo = Files::upload($request->photo, 'avatar', 300);
        }

        if ($request->has('gender')) {
            $jobApplication->gender = $request->gender;
        }

        if($request->date_of_birth != null){
            if ($request->has('date_of_birth')) {
                $date_of_birth = Carbon::createFromFormat($this->global->date_format, $request->date_of_birth)->format('Y-m-d');
                $jobApplication->date_of_birth = $date_of_birth;
            }
        }

        $jobApplication->save();
        $job = RecruitJobApplication::with('job')->where('id', $request->job_id)->get();
        // Mail to candidate
        Notification::send($jobApplication, new FrontJobApplyCandidate($jobApplication, $job));

        if (request()->hasFile('resume')) {
            $file = new RecruitApplicationFile();
            $file->application_id = $jobApplication->id;
            Files::deleteFile($jobApplication->resume, 'application-files/');
            $filename = Files::uploadLocalOrS3(request()->resume, 'application-files/' . $jobApplication->id);
            $file->filename = request()->resume->getClientOriginalName();
            $file->hashname = $filename;
            $file->size = request()->resume->getSize();
            $file->save();
        }

        if ($request->has('gender')) {
            $jobApplication->gender = $request->gender;
        }

        if ($request->has('dob')) {
            $jobApplication->dob = $request->dob;
        }

        if (!empty($request->skill_id)) {
            RecruitApplicationSkill::where('application_id', $request->application_id)->delete();

            foreach ($request->skill_id as $tag) {
                $jobSkill = new RecruitApplicationSkill();
                $jobSkill->application_id = $jobApplication->id;
                $jobSkill->skill_id = $tag;
                $jobSkill->save();
            }
        }

        event(new NewJobApplicationEvent($jobApplication));
        $users = User::allAdmins();
        Notification::send($users, new NewJobApplication($jobApplication));

        return Reply::dataOnly(['status' => 'success', 'redirectUrl' => route('front.thankyou-page'),'application_id' => $jobApplication->id]);
    }

    public function thankyouPage()
    {
        $this->address = CompanyAddress::all();
        $this->setting = RecruitSetting::first();
        return view('recruit::front.thankyou-page', $this->data);
    }

    public function customPage($slug)
    {
        $this->customPage = RecruitFooterLink::where('slug', $slug)->where('status', 'active')->first();

        if (is_null($this->customPage)) {
            abort(404);
        }

        $this->pageTitle = ucfirst($this->customPage->name);

        return view('recruit::front.custom-page', $this->data);
    }

    public function download($id)
    {
        $this->jobOffer = RecruitJobOfferLetter::with(['files', 'job', 'jobApplication'])->findOrfail($id);
        $pdf = app('dompdf.wrapper');

        $this->global = $this->settings = global_setting();

        $pdf->loadView('recruit::jobs.offer-letter.offer-letter-pdf', $this->data);

        $dom_pdf = $pdf->getDomPDF();
        $canvas = $dom_pdf->get_canvas();
        $canvas->page_text(530, 820, 'Page {PAGE_NUM} of {PAGE_COUNT}', null, 10, array(0, 0, 0));

        $filename = 'offer-letter' . $this->jobOffer->jobApplication->full_name;

        return $pdf->download($filename . '.pdf');
    }
    
}
