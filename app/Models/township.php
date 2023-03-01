<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Township extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'division_state_id', 'region_id'];

    /**
     * Get the divisionstate that owns the township
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function divisionstate(): BelongsTo
    {
        return $this->belongsTo(DivisionState::class, 'division_state_id');
    }

        /**
     * Get the region that owns the DivisionState
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
}
