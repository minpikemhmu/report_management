<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BaStaff extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'ba_staffs';

    protected $fillable = ['ba_code', 'name', 'supervisor_id', 'city_id', 'customer_id', 'product_brand_id', 'channel_id', 'subchannel_id', 'password'];

    public function supervisor(): BelongsTo
    {
        return $this->belongsTo(Supervisor::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function channel(): BelongsTo
    {
        return $this->belongsTo(Channel::class);
    }

    public function subchannel(): BelongsTo
    {
        return $this->belongsTo(SubChannel::class);
    }

    /**
     * Get all of the baReports for the BaStaff
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function baReports(): HasMany
    {
        return $this->hasMany(BaDailyReport::class, 'bastaff_id', 'id');
    }

    /**
     * Get all of the attendances for the BaStaff
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attendances(): HasMany
    {
        return $this->hasMany(BaAttendance::class, 'staff_id', 'id');
    }

    /**
     * Get the productBrand that owns the BaStaff
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productBrand(): BelongsTo
    {
        return $this->belongsTo(ProductBrand::class, 'product_brand_id', 'id');
    }
}
