<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Merchandiser extends Model
{
    use HasFactory;
    protected $fillable = [ 'name', 'mer_code', 'region_id', 'merchant_team_id', 'merchant_area_id', 'channel_id'];

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function merchantTeam(): BelongsTo
    {
        return $this->belongsTo(MerchantTeam::class);
    }

    public function merchantArea(): BelongsTo
    {
        return $this->belongsTo(MerchantArea::class);
    }

    public function channel(): BelongsTo
    {
        return $this->belongsTo(Channel::class);
    }

    public function customers()
    {
        return $this->belongsToMany(Customer::class)->withPivot('assign_date')
        ->withTimestamps();
    }
}