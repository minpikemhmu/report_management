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
    protected $fillable = [ 'merchandiser_id', 'customer_id', 'gondolar_type_id', 'trip_type_id', 'outskirt_type_id', 'merchandiser_report_type_id','qty','gondolar_size_inches_length', 'gondolar_size_inches_weight',
                            'gondolar_size_centimeters_length', 'gondolar_size_centimeters_weight', 'backlit_size_inches_length', 'backlit_size_inches_weight', 'backlit_size_centimeters_length', 'backlit_size_centimeters_weight',
                            'outlet_photo_before', 'outlet_photo_after', 'remark', 'latitude', 'longitude', 'actual_latitude', 'actual_longitude', 'planogram', 'hygiene', 'sale_team_visit', 'outlet_status',];

    
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
