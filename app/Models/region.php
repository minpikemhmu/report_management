<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Region extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function divisionstates(): HasMany
    {
        return $this->hasMany(DivisionState::class);
    }

    /**
     * Get all of the townships for the region
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function townships(): HasMany
    {
        return $this->hasMany(Township::class);
    }

    /**
     * Get all of the cities for the region
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }
}
