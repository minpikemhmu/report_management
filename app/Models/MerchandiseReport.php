<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MerchandiseReport extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = [ 'merchandiser_id', 'customer_id', 'merchandiser_report_type_id', 'field_1', 'field_2', 'field_3', 'field_4', 'field_5',
    'field_6' ,'field_7', 'field_8', 'field_9', 'field_10', 'field_11', 'field_12', 'field_13', 'field_14', 'field_15', 'field_16', 'field_17', 'field_18', 'field_19', 'field_20',
    'latitude', 'longitude', 'actual_latitude', 'actual_longitude'];

    
    public function merchandiser(): BelongsTo
    {
        return $this->belongsTo(Merchandiser::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function gondolar_type(): BelongsTo
    {
        return $this->belongsTo(GondolarType::class);
    }

    public function trip_type(): BelongsTo
    {
        return $this->belongsTo(TripType::class);
    }

    public function outskirt_type(): BelongsTo
    {
        return $this->belongsTo(OutskirtType::class);
    }
    public function merchandiser_report_type(): BelongsTo
    {
        return $this->belongsTo(MerchandiserReportType::class);
    }
}
