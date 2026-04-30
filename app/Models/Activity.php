<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use SoftDeletes;

    protected $casts = [
        'start_time' => 'datetime',
    ];

    public function serviceTypes(): BelongsToMany
    {
        return $this->belongsToMany(ServiceType::class, 'activity_service_type');
    }

    public function scheduleGroups(): HasMany
    {
        return $this->hasMany(ScheduleGroup::class);
    }
}
