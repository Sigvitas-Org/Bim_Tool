<?php
namespace Modules\Recruit\Traits;

use Illuminate\Support\Facades\Config;
use Modules\Zoom\Entities\ZoomSetting as EntitiesZoomSetting;

trait ZoomSettings{

    public function setZoomConfigs(){
        if(in_array('Zoom', worksuite_plugins())){
        $settings = EntitiesZoomSetting::first();
        $key       = ($settings->api_key)? $settings->api_key : env('STRIPE_KEY');
        $apiSecret = ($settings->secret_key)? $settings->secret_key : env('STRIPE_SECRET');

        Config::set('zoom.api_key', $key);
        Config::set('zoom.api_secret', $apiSecret);
    }
    }
}



