<?php

namespace Modules\Recruit\Entities;

use App\Models\BaseModel;
use App\Models\EmployeeDetails;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Recruit\Observers\InterviewScheduleObserver;
use App\Models\User;
use Carbon\Carbon;
use Modules\Recruit\Entities\RecruitJobApplication;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Modules\Zoom\Entities\ZoomMeeting;

class RecruitInterviewSchedule extends BaseModel
{
    use Notifiable;

    protected $dates = ['end_date', 'start_date'];

    public static function boot()
    {
        parent::boot();
        static::observe(InterviewScheduleObserver::class);
    }

    public function jobApplication(): BelongsTo
    {
        return $this->belongsTo(RecruitJobApplication::class);
    }

    // Relation with user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'added_by');
    }

    public function meeting(): BelongsTo
    {
        if (in_array('Zoom', worksuite_plugins())) {
            return $this->belongsTo(ZoomMeeting::class, 'meeting_id');
        }
    }

    // Relation with user
    public function comments(): HasMany
    {
        return $this->hasMany(RecruitInterviewComments::class, 'interview_schedule_id');
    }

    // Relation with user
    public function employeesData(): HasMany
    {
        return $this->hasMany(RecruitInterviewEmployees::class, 'interview_schedule_id', 'id');
    }

    public function employees(): BelongsToMany
    {
        return $this->belongsToMany(User::class, RecruitInterviewEmployees::class, 'interview_schedule_id');
    }

    public function employeeData($userId)
    {
        return RecruitInterviewSchedule::where('user_id', $userId)->where('interview_schedule_id', $this->id)->first();
    }

    public function files(): HasMany
    {
        return $this->hasMany(RecruitInterviewFile::class, 'interview_id')->orderBy('id', 'desc');
    }

    public function getScheduleDateAttribute($value)
    {
        return Carbon::parse($value);
    }

    public function attendees(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'recruit_interview_employees', 'interview_schedule_id', 'user_id');
    }

    public function recruiters(): BelongsToMany
    {
        return $this->belongsToMany(EmployeeDetails::class, 'user', 'user_id', 'id');
    }

    public function stage(): BelongsTo
    {
        return $this->belongsTo(RecruitInterviewStage::class, 'stage_id');
    }

}
