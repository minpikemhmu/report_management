<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Outlet extends Model
{
    use HasFactory; 

    protected $fillable = ['outlet_id', 'name'];

    /**
     * Get all of the baReports for the BaStaff
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function baReports(): HasMany
    {
        return $this->hasMany(BaDailyReport::class, 'ba_report_type_id', 'id');
    }
}
