<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MrExecutive extends Model
{
    use HasFactory;

    protected $fillable = ['name','manager_id'];

    public function manager(): BelongsTo
    {
        return $this->belongsTo(MrManager::class);
    }

    public function supervisors(): HasMany
    {
        return $this->hasMany(MrSupervisor::class);
    }
}
