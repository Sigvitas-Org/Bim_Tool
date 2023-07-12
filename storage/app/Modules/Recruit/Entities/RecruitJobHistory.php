<?php

namespace Modules\Recruit\Entities;

use App\Models\BaseModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecruitJobHistory extends BaseModel
{
    use HasFactory;

    protected $with = ['user'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id')->withoutGlobalScopes(['active']);
    }
    
}
