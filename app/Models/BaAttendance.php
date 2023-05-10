<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BaAttendance extends Attendance
{
    use HasFactory;

    protected $table = 'ba_attendances';

    /**
     * Get the staff that owns the BaStaff
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function staff(): BelongsTo
    {
        return $this->belongsTo(BaStaff::class, 'staff_id', 'id');
    }
}
