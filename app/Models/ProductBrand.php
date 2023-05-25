<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class ProductBrand extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Get all of the products for the ProductBrand
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'product_brands_id');
    }

    /**
     * Get all of the baStaffs for the ProductBrand
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function baStaffs(): HasMany
    {
        return $this->hasMany(BaStaff::class);
    }
}
