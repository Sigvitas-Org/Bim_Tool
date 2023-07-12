<?php

namespace Modules\Recruit\Entities;

use App\Models\BaseModel;
use App\Models\EmployeeDetails;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Recruiter extends BaseModel
{
    protected $fillable = [];

    public function employeeDetail(): BelongsTo
    {
        return $this->belongsTo(EmployeeDetails::class, 'employee_id');
    }

    public function emp(): BelongsTo
    {
        return $this->belongsTo(RecruitInterviewEmployees::class, 'employee_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
