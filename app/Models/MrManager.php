<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MrManager extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function executives(): HasMany
    {
        return $this->hasMany(MrExecutive::class);
    }
}
