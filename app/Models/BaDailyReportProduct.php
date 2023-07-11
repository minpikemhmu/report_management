<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaDailyReportProduct extends Model
{
    use HasFactory;

    protected $table = 'ba_daily_report_products';

    protected $fillable = [
        'ba_daily_report_id',
        'product_id',
        'count',
        'price',
        'manufacture_date',
        'expiry_date',
    ];

    public function report()
    {
        return $this->belongsTo(BaDailyReport::class, 'ba_daily_report_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
