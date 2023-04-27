<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BaReportType extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    /**
     * Get all of the baReports for the BaStaff
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function baReports(): HasMany
    {
        return $this->hasMany(BaDailyReport::class, 'outlet_id', 'id');
    }
}
