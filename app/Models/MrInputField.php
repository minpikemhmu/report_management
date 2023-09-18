<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MrInputField extends Model
{
    use HasFactory;

    protected $fillable = ['merchandiser_report_type_id', 'display_name', 'identifier', 'display_order', 'field_type', 'isRequired', 'list_data', 'active_status'];

    public function merchandiser_report_type(): BelongsTo
    {
        return $this->belongsTo(MerchandiserReportType::class);
    }
}
