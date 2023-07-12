<?php

namespace Modules\Recruit\Entities;

use App\Models\BaseModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Recruit\Observers\InterviewEmployeeObserver;

class RecruitInterviewEmployees extends BaseModel
{
    use HasFactory;

    protected $fillable = ['user_id','interview_schedule_id'];

    public static function boot()
    {
        parent::boot();
        static::observe(InterviewEmployeeObserver::class);
    }

    public function schedule(): BelongsTo
    {
        return $this->belongsTo(RecruitInterviewSchedule::class, 'interview_schedule_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
