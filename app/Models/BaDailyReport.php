<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BaDailyReport extends Model
{
    use HasFactory;

    protected $fillable = ['ba_report_date', 'bastaff_id', 'customer_id', 'ba_report_type_id', 'products'];

    /**
     * Get the baStaff that owns the BaDailyReport
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function baStaff(): BelongsTo
    {
        return $this->belongsTo(BaStaff::class, 'bastaff_id', 'id');
    }

    /**
     * Get the customer that owns the BaDailyReport
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    /**
     * Get the baReportType that owns the BaDailyReport
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function baReportType(): BelongsTo
    {
        return $this->belongsTo(BaReportType::class, 'ba_report_type_id', 'id');
    }

    /**
     * Get all of the products for the BaDailyReport
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function products(): HasManyThrough
    {
        return $this->hasManyThrough(Product::class, BaDailyReportProduct::class, 'ba_daily_report_id', 'id', 'id', 'product_id');
    }

    /**
     * Get all of the baDailyReportProducts for the BaDailyReport
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function baDailyReportProducts(): HasMany
    {
        return $this->hasMany(BaDailyReportProduct::class);
    }
}
