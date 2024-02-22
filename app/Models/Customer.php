<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory; 
    protected $fillable = ['name', 'dksh_customer_id', 'is_ba', 'address', 'phone_number', 'division_state_id', 'township_id', 'city_id', 'customer_type_id', 'total_frequency', 'outlet_brand'];

    public function division_state(): BelongsTo
    {
        return $this->belongsTo(DivisionState::class);
    }

    public function township(): BelongsTo
    {
        return $this->belongsTo(Township::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function customer_type(): BelongsTo
    {
        return $this->belongsTo(CustomerType::class, 'customer_type_id');
    }

    public function merchandisers()
    {
        return $this->belongsToMany(Merchandiser::class);
    }

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
