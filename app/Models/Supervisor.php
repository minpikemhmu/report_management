<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Sanctum\HasApiTokens;

class Supervisor extends Model
{
    use HasFactory, HasApiTokens; 

    protected $fillable = ['name', 'code', 'password', 'region_id', 'executive_id',];

    /**
     * Get the region that owns the Supervisor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    public function executive(): BelongsTo
    {
        return $this->belongsTo(BaExecutive::class, 'executive_id');
    }
}
