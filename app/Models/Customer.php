<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer extends Model
{
    use HasFactory; 
    protected $fillable = ['name', 'dksh_customer_id', 'address', 'phone_number', 'division_state_id', 'township_id', 'city_id', 'customer_type_id', 'total_frequency'];

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

}
