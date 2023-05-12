<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'product_code', 'brn_code', 'product_brands_id', 'product_category_id', 'product_key_category_id', 'product_sub_category_id', 'size', 'price'];

    /**
     * Get the productbrand that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productbrand(): BelongsTo
    {
        return $this->belongsTo(ProductBrand::class, 'product_brands_id');
    }

    /**
     * Get the productcategory that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productcategory(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    /**
     * Get the productsubcategory that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productsubcategory(): BelongsTo
    {
        return $this->belongsTo(ProductSubCategory::class, 'product_sub_category_id');
    }

    /**
     * Get the productKeyCategory that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productKeyCategory(): BelongsTo
    {
        return $this->belongsTo(ProductKeyCategory::class, 'product_key_category_id');
    }

    /**
     * Get all of the baDailyReportProducts for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function baDailyReportProducts(): HasMany
    {
        return $this->hasMany(BaDailyReportProduct::class);
    }

    /**
     * Get all of the baDailyReports for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function baDailyReports(): HasManyThrough
    {
        return $this->hasManyThrough(BaDailyReport::class, BaDailyReportProduct::class, 'product_id', 'id', 'id', 'ba_daily_report_id');
    }

}
