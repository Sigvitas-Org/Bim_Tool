<?php

namespace Modules\Recruit\Entities;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecruitJobSkill extends BaseModel
{
    
    public function skill(): BelongsTo
    {
        return $this->belongsTo(RecruitSkill::class, 'skill_id');
    }

}
