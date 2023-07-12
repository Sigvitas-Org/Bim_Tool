<?php

namespace Modules\Recruit\Http\Controllers\Front;

use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Modules\Recruit\Entities\RecruitFooterLink;
use Modules\Recruit\Entities\RecruitSetting;

class FrontBaseController extends Controller
{
    /**
     * @var array
     */
    public $data = [];

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->data[$name];
    }

    /**
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->data[ $name ]);
    }

    /**
     * UserBaseController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->global = global_setting();
        $this->companyName = $this->global->company_name;
        $this->customPages = RecruitFooterLink::where('status', 'active')->get();
        $this->setting = RecruitSetting::first();
        App::setLocale($this->global->locale);
        setlocale(LC_TIME, $this->global->locale.'_'.strtoupper($this->global->locale));
    }
    
}
