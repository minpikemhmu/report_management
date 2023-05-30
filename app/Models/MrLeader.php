<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MrLeader extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'supervisor_id'];

    public function supervisor(): BelongsTo
    {
        return $this->belongsTo(MrSupervisor::class, 'supervisor_id');
    }
}
