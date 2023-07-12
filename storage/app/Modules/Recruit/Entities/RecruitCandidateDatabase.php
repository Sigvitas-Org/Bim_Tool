<?php

namespace Modules\Recruit\Entities;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RecruitCandidateDatabase extends BaseModel
{
    use HasFactory;

    protected $table = 'recruit_candidate_database';

    protected $casts = [
        'skills' => 'json'
    ];

    protected $fillable = [];
}
