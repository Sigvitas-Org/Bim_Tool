<?php

namespace Modules\Recruit\Entities;

use App\Models\BaseModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Recruit\Observers\EvaluationObserver;

class RecruitInterviewEvaluation extends BaseModel
{
    protected $fillable = [];

    public static function boot()
    {
        parent::boot();
        static::observe(EvaluationObserver::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(RecruitRecommendationStatus::class, 'status_id');
    }

    public function interview(): BelongsTo
    {
        return $this->belongsTo(RecruitInterviewSchedule::class, 'interview_schedule_id');
    }

    // Relation with user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'submitted_by');
    }

    public function stage(): BelongsTo
    {
        return $this->belongsTo(RecruitInterviewStage::class, 'stage_id');
    }
    
}
