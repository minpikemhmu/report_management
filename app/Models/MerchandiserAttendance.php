<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MerchandiserAttendance extends Attendance
{
    use HasFactory;

    protected $table = 'merchandiser_attendances';

    protected $fillable = ['staff_id', 'is_check_in', 'is_check_out', 'is_attendance', 'check_in_time', 'check_out_time', 'check_in_latitude', 'check_in_longitude', 'check_out_latitude', 'check_out_longitude'];

    /**
     * Get the staff that owns the BaStaff
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function staff(): BelongsTo
    {
        return $this->belongsTo(Merchandiser::class, 'staff_id', 'id');
    }
}
