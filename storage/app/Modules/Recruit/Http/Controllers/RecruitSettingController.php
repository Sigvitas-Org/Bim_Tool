<?php

namespace Modules\Recruit\Http\Controllers;

use App\Helper\Files;
use App\Helper\Reply;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Modules\Recruit\Entities\RecruitSetting;
use App\Http\Controllers\AccountBaseController;
use App\Models\User;
use Modules\Recruit\Entities\RecruitEmailNotificationSetting;
use Modules\Recruit\Entities\Recruiter;
use Modules\Recruit\Entities\RecruitFooterLink;
use Modules\Recruit\Http\Requests\RecruitSetting\StoreSettingRequest;

class RecruitSettingController extends AccountBaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = 'recruit::app.menu.recruitSetting';
    }

    public function index()
    {
        $this->mail = RecruitSetting::first();
        $this->recruiters = Recruiter::with('user')->get();
        $this->employees = User::allEmployees()->all();
        $this->selectedRecruiter = Recruiter::get()->pluck('user_id')->toArray();
        $this->activeSettingMenu = 'recruit_settings';
        $this->emailSettings = RecruitEmailNotificationSetting::all();
        $this->footerLinks = RecruitFooterLink::all();

        $tab = request('tab');

        switch ($tab) {
        case 'recruit-setting':
            $this->view = 'recruit::recruit-setting.ajax.recruit-setting';
            break;
        case 'footer-settings':
            $this->view = 'recruit::recruit-setting.ajax.footer-settings';
            break;
        case 'recruit-email-notification-setting':
            $this->view = 'recruit::recruit-setting.ajax.recruit-email-notification-setting';
            break;
        default:
            $this->general = RecruitSetting::select('about')->first();
            $this->view = 'recruit::recruit-setting.ajax.general-setting';
            break;
        }

            ($tab == '') ? $this->activeTab = 'general-setting' : $this->activeTab = $tab;

        if (request()->ajax()) {
            $html = view($this->view, $this->data)->render();
            return Reply::dataOnly(['status' => 'success', 'html' => $html, 'title' => $this->pageTitle, 'activeTab' => $this->activeTab]);
        }

        return view('recruit::recruit-setting.index', $this->data);
    }

    public function update(StoreSettingRequest $request)
    {
        $arr = $request->checkBoardColumn;
        $settings = RecruitSetting::first();

        $mailSetting = [];

        foreach ($settings->mail_setting as $id => $setting) {
            $setting['status'] = false;

            if ($request->has('checkBoardColumn') && in_array($id, $arr)) {
                $setting['status'] = true;
            }

            $mailSetting = Arr::add($mailSetting, $id, $setting);
        }

        // Background image

        if ($request->image_delete == 'yes') {
            Files::deleteFile($settings->background_image, 'background');
            $settings->background_image = null;
        }
        elseif ($request->type == 'bg-image') {
            $oldImage = $settings->background_image;

            if ($request->hasFile('image')) {
                $settings->background_image = Files::uploadLocalOrS3($request->image, 'background');

                $path = 'user-uploads/background' . '/' . $oldImage;

                if (\File::exists($path)) {
                    Files::deleteFile($oldImage, 'background');
                }
            }
        }
        elseif ($request->type == 'bg-color') {
            $settings->background_color = $request->logo_background_color;
        }

        // front page logo

        if ($request->logo_delete == 'yes') {
            Files::deleteFile($settings->logo, 'company-logo');
            $settings->logo = null;
        }

        if ($request->hasFile('logo')) {
            Files::deleteFile($settings->logo, 'company-logo');
            $settings->logo = Files::uploadLocalOrS3($request->logo, 'company-logo');
        }

        if ($request->favicon_delete == 'yes') {
            Files::deleteFile($settings->favicon, 'company-favicon');
            $settings->favicon = null;
        }

        if ($request->hasFile('favicon')) {
            $settings->favicon = Files::uploadLocalOrS3($request->favicon, 'company-favicon', null, null, false);
        }

        $settings->company_name = $request->company_name;
        $settings->application_restriction = $request->application_restriction;
        $settings->company_website = $request->company_website;
        $settings->about = $request->about;
        $settings->type = $request->type;
        $settings->mail_setting = $mailSetting;
        $settings->legal_term = ($request->description == '<p><br></p>') ? null : $request->description;
        $settings->save();
        return Reply::successWithData(__('recruit::messages.settingupdated'), ['redirectUrl' => route('recruit-settings.index')]);
    }

    public function store(Request $request)
    {
        $settings = RecruitSetting::first();

        if ($request->has('career_site')) {
            $settings->career_site = $request->career_site;
        }

        $settings->save();
    }
    
}
