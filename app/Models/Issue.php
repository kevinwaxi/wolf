<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Issue extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'device_id',
        'date',
        'description',
        'isUrgent',
        'pricing',
        'status',
        'status-log'
    ];

    protected $casts = [
        'date' => 'datetime',
        'isUrgent' => 'boolean',
        'status' => StatusEnum::class
    ];

    /**
     * Get the device that owns the Issue
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function device(): BelongsTo
    {
        return $this->belongsTo(Device::class);
    }
}
