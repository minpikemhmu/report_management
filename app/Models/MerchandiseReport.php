<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class MerchandiseReport extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = [ 'merchandiser_id', 'customer_id', 'gondolar_type_id', 'trip_type_id', 'outskirt_type_id', 'gondolar_size_inches_length', 'gondolar_size_inches_weight',
                            'gondolar_size_centimeters_length', 'gondolar_size_centimeters_weight', 'backlit_size_inches_length', 'backlit_size_inches_weight', 'backlit_size_centimeters_length', 'backlit_size_centimeters_weight',
                            'outlet_photo_before', 'outlet_photo_after', 'remark','plus_code'];
}
