<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DivisionState extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'region_id'];

    /**
     * Get the region that owns the DivisionState
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    /**
     * Get all of the townships for the DivisionState
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function townships(): HasMany
    {
        return $this->hasMany(Township::class, 'division_state_id');
    }

    /**
     * Get all of the cities for the DivisionState
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cities(): HasMany
    {
        return $this->hasMany(City::class, 'division_state_id');
    }
}
