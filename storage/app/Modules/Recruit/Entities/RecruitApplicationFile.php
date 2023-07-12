<?php

namespace Modules\Recruit\Entities;

use App\Models\BaseModel;
use App\Traits\IconTrait;
use Illuminate\Database\Eloquent\Model;
use Modules\Recruit\Observers\ApplicationFilesObserver;

class RecruitApplicationFile extends BaseModel
{
    use IconTrait;

    protected $dates = ['end_date', 'start_date', 'date_of_birth'];
    protected $fillable = ['name', 'email', 'phone', 'gender'];
    protected $appends = [
        'file_url', 'icon'
    ];

    public function getTitleAttribute($value)
    {
        return ucwords($value);
    }

    public static function boot()
    {
        parent::boot();
        static::observe(ApplicationFilesObserver::class);
    }

    public function getFileUrlAttribute()
    {
        return (!is_null($this->external_link)) ? $this->external_link : asset_url_local_s3('application-files/' . $this->application_id . '/' . $this->hashname);
    }

}
