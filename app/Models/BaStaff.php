<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaStaff extends Model
{
    use HasFactory;

    protected $table = 'ba_staffs';

    protected $fillable = ['ba_code', 'name', 'supervisor_id', 'city_id', 'outlet_id', 'channel_id', 'subchennel_id'];
}
