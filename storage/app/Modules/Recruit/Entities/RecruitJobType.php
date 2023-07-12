<?php

namespace Modules\Recruit\Entities;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RecruitJobType extends BaseModel
{
    use HasFactory;

    protected $fillable = [];
    protected $table = 'recruit_job_types';
}
