<?php

namespace Modules\Recruit\Entities;

use App\Models\BaseModel;
use App\Models\Team;
use App\Models\User;
use App\Models\CompanyAddress;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Recruit\Observers\JobsObserver;

class RecruitJob extends BaseModel
{
    use SoftDeletes;

    protected $dates = ['end_date', 'start_date', 'deleted_at'];

    protected $casts = [
        'meta_details' => 'array',
    ];

    public static function boot()
    {
        parent::boot();
        static::observe(JobsObserver::class);
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'department_id');
    }

    public function skills(): HasMany
    {
        return $this->hasMany(RecruitJobSkill::class, 'job_id');
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(CompanyAddress::class, 'location_id');
    }

    public function files(): HasMany
    {
        return $this->hasMany(RecruitJobFile::class, 'job_id')->orderBy('id', 'desc');
    }

    public function workExperience(): BelongsTo
    {
        return $this->belongsTo(RecruitWorkExperience::class, 'work_experience_id');
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'recruiter_id');
    }

    public function jobType(): BelongsTo
    {
        return $this->belongsTo(RecruitJobType::class, 'job_type_id');
    }

    public function address(): BelongsToMany
    {
        return $this->belongsToMany(CompanyAddress::class, 'recruit_job_addresses', 'job_id', 'address_id', 'id', 'id');
    }

    public function recruiter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'recruiter_id');
    }

    public static function activeJobs()
    {
        return RecruitJob::where('status', 'open')
            ->where('start_date', '<=', now()->format('Y-m-d'))
            ->where('end_date', '>=', now()->format('Y-m-d'))
            ->get();
    }

    public function stages(): BelongsToMany
    {
        return $this->belongsToMany(RecruitInterviewStage::class, 'job_interview_stages', 'job_id', 'stage_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'added_by');
    }
    
}
