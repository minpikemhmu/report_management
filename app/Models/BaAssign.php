<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BaAssign extends Model
{
    use HasFactory;

    protected $table = 'ba_assigns';

    protected $fillable = [
        'ba_staff_id',
        'product_key_category_id',
        'target_quantity',
        'month',
        'year'
    ];

    /**
     * Get the baStaff that owns the BaAssign
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function baStaff(): BelongsTo
    {
        return $this->belongsTo(BaStaff::class, 'ba_staff_id');
    }

    /**
     * Get the productKeyCategory that owns the BaAssign
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productKeyCategory(): BelongsTo
    {
        return $this->belongsTo(ProductKeyCategory::class, 'product_key_category_id');
    }
}
