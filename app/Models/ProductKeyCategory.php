<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductKeyCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Get all of the products for the ProductKeyCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'product_key_category_id');
    }
}
