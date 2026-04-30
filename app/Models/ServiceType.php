<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceType extends Model
{
    use SoftDeletes;

    public function activities(): BelongsToMany
    {
        return $this->belongsToMany(Activity::class, 'activity_service_type');
    }
}
