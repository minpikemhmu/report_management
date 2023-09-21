<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;

class MrExecutive extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = ['name','code', 'password', 'manager_id'];

    public function manager(): BelongsTo
    {
        return $this->belongsTo(MrManager::class);
    }

    public function supervisor(): HasMany
    {
        return $this->hasMany(MrSupervisor::class);
    }
}
