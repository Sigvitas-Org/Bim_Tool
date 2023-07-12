<?php

namespace Modules\Recruit\Http\Controllers;

use App\Helper\Reply;
use App\Http\Controllers\AccountBaseController;
use DebugBar\DataCollector\Renderable;
use Illuminate\Http\Request;
use Modules\Recruit\Entities\RecruitEmailNotificationSetting;

class RecruitEmailNotificationSettingsController extends AccountBaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->activeSettingMenu = 'recruit_settings';
    }

    /**
       * Update the specified resource in storage.
       * @param Request $request
       * @param int $id
       * @return Renderable
       */
    public function update(Request $request)
    {
        RecruitEmailNotificationSetting::where('send_email', 'yes')->update(['send_email' => 'no']);

        if ($request->send_email) {
            RecruitEmailNotificationSetting::whereIn('id', $request->send_email)->update(['send_email' => 'yes']);
        }

        return Reply::success(__('messages.updateSuccess'));
    }
    
}
