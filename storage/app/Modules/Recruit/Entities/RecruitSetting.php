<?php

namespace Modules\Recruit\Entities;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RecruitSetting extends BaseModel
{
    use HasFactory;

    protected $fillable = [];

    protected $casts = [
        'mail_setting' => 'json'
    ];
    protected $appends = [
        'logo_url',
        'favicon_url'
    ];

    public function getBackgroundImageUrlAttribute()
    {
        if (is_null($this->background_image)) {
            return asset('img/image-bg.jpg');
        }

        return asset_url('background/' . $this->background_image);
    }

    public function getLogoUrlAttribute()
    {
        if (is_null($this->logo)) {
            return asset('img/worksuite-logo.png');
        }

        return asset_url('company-logo/' . $this->logo);
    }

    public function getFaviconUrlAttribute()
    {
        if (is_null($this->favicon)) {
            return asset('favicon.png');
        }

        return asset_url('company-favicon/' . $this->favicon);
    }

}
