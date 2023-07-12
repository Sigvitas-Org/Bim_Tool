<?php

namespace Modules\Recruit\Entities;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Recruit\Observers\RecruitSkillObserver;

class RecruitSkill extends BaseModel
{
    protected $fillable = ['name'];

    public static function boot()
    {
        parent::boot();
        static::observe(RecruitSkillObserver::class);
    }

    public function job(): BelongsTo
    {
        return $this->belongsTo(RecruitJob::class, 'job_id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(RecruitJob::class, 'recruit_job_skills');
    }

}
