<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;

class MrSupervisor extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = ['name', 'code', 'password',  'executive_id'];


    public function executive(): BelongsTo
    {
        return $this->belongsTo(MrExecutive::class, 'executive_id');
    }

    public function leaders(): HasMany
    {
        return $this->hasMany(MrLeader::class);
    }
}
