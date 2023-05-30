<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BaExecutive extends Model
{
    use HasFactory;
    protected $fillable = ['name','manager_id'];

    public function manager(): BelongsTo
    {
        return $this->belongsTo(BaManager::class);
    }

    public function supervisors(): HasMany
    {
        return $this->hasMany(Supervisor::class);
    }
}
