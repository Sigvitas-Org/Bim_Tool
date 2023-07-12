<?php

namespace Modules\Recruit\Entities;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RecruitApplicationStatusCategory extends BaseModel
{
    use HasFactory;

    protected $fillable = [];

    public function status(): HasMany
    {
        return $this->hasMany(RecruitApplicationStatus::class, 'category_id');
    }

}
