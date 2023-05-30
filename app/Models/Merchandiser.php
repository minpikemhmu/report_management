<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Http\Request;

class Merchandiser extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = ['name', 'mer_code', 'password', 'region_id', 'merchant_team_id', 'merchant_area_id', 'channel_id', 'leader_id'];

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

    public function leader(): BelongsTo
    {
        return $this->belongsTo(MrLeader::class);
    }

    public function customers()
    {
        return $this->belongsToMany(Customer::class)->withPivot('assign_date')
            ->withTimestamps();
    }

    /**
     * Get all of the attendances for the BaStaff
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attendances(): HasMany
    {
        return $this->hasMany(MerchandiserAttendance::class, 'staff_id', 'id');
    }
}
