<?php

namespace Modules\Recruit\Entities;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobInterviewStage extends BaseModel
{
    protected $fillable = [];

    public function stage(): BelongsTo
    {
        return $this->belongsTo(RecruitInterviewStage::class, 'stage_id');
    }

}
