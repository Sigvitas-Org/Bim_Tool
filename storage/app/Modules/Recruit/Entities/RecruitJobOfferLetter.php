<?php

namespace Modules\Recruit\Entities;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Modules\Recruit\Observers\OfferLetterObserver;

class RecruitJobOfferLetter extends BaseModel
{
    use Notifiable;
    use HasFactory;

    protected $table = 'recruit_job_offer_letter';
    protected $dates = ['jobExpireDate', 'expJoinDate', 'created_at', 'offer_accept_at'];
    protected $fillable = [];

    public static function boot()
    {
        parent::boot();
        static::observe(OfferLetterObserver::class);
    }

    public function getFileUrlAttribute()
    {
        return (!is_null($this->external_link)) ? $this->external_link : asset_url_local_s3('offer/accept/' . $this->sign_image);
    }

    public function files(): HasMany
    {
        return $this->hasMany(RecruitJobOfferLetterFiles::class, 'job_offer_id')->orderBy('id', 'desc');
    }

    public function job(): BelongsTo
    {
        return $this->belongsTo(RecruitJob::class, 'job_id')->withTrashed();
    }

    public function jobApplication(): BelongsTo
    {
        return $this->belongsTo(RecruitJobApplication::class, 'job_app_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'added_by');
    }
    
}
