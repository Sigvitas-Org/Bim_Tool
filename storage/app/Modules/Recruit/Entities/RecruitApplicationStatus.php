<?php

namespace Modules\Recruit\Entities;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RecruitApplicationStatus extends BaseModel
{

    protected $dates = ['end_date', 'start_date'];

    protected $table = 'recruit_application_status';

    public function applications(): HasMany
    {
        return $this->hasMany(RecruitJobApplication::class, 'status_id');
    }

    public function userSetting(): HasOne
    {
        return $this->hasOne(RecruitJobboardSetting::class, 'board_column_id')->where('user_id', user()->id);
    }
    
}
