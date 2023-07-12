<?php

namespace Modules\Recruit\Entities;

use App\Models\BaseModel;
use App\Models\CompanyAddress;
use App\Models\Team;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Recruit\Entities\RecruitJob;
use Illuminate\Notifications\Notifiable;
use Modules\Recruit\Observers\JobApplicationsObserver;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecruitJobApplication extends BaseModel
{
    use Notifiable;
    use SoftDeletes;

    protected $dates = ['end_date', 'start_date','date_of_birth', 'deleted_at'];
    protected $fillable = ['name', 'email', 'phone', 'gender', 'status_id'];

    public function getImageUrlAttribute()
    {
        $gravatarHash = md5(strtolower(trim($this->email)));
        return ($this->photo) ? asset_url('avatar/' . $this->photo) : 'https://www.gravatar.com/avatar/' . $gravatarHash . '.png?s=200&d=mp';
    }

    public function hasGravatar($email)
    {
        // Craft a potential url and test its headers
        $hash = md5(strtolower(trim($email)));

        $uri = 'http://www.gravatar.com/avatar/' . $hash . '?d=404';
        $headers = @get_headers($uri);

        $has_valid_avatar = true;

        try {
            if (!preg_match('|200|', $headers[0])) {
                $has_valid_avatar = false;
            }
        } catch (\Exception $e) {
            $has_valid_avatar = true;
        }

        return $has_valid_avatar;
    }

    public function getTitleAttribute($value)
    {
        return ucwords($value);
    }

    public static function boot()
    {
        parent::boot();
        static::observe(JobApplicationsObserver::class);
    }

    public function job(): BelongsTo
    {
        return $this->belongsTo(RecruitJob::class, 'job_id')->withTrashed();
    }

    public function applicationStatus(): BelongsTo
    {
        return $this->belongsTo(RecruitApplicationStatus::class, 'status_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(RecruitApplicantNote::class, 'job_application_id')->orderBy('id', 'desc');
    }

    public function files(): HasMany
    {
        return $this->hasMany(RecruitApplicationFile::class, 'application_id')->orderBy('id', 'desc');
    }

    public function source(): BelongsTo
    {
        return $this->belongsTo(ApplicationSource::class, 'application_source_id');
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(CompanyAddress::class, 'location_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'added_by');
    }
    
}
