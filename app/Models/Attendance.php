<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id',
        'is_check_in',
        'is_check_out',
        'check_in_time',
        'check_out_time',
    ];

    public function scopeToday(Builder $query)
    {
        return $query->whereDate('created_at', now()->toDateString());
    }
}
