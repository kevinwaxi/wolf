<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Device extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'customer_id',
        'brand',
        'name',
        'model_number',
        'serial_number',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function issues(): HasMany
    {
        return $this->hasMany(Issue::class);
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";

        $query->where(function ($query) use ($term) {
            $query->where('name', 'like', $term)
                ->orWhere('brand', 'like', $term)
                ->orWhere('model_number', 'like', $term);
        });
    }

    public function scopeDeviceQuery($query)
    {
        $search_term = request('search', '');

        $sort_direction = request('sort_direction', 'desc');

        if (! in_array($sort_direction, ['asc', 'desc'])) {
            $sort_direction = 'desc';
        }

        $sort_field = request('sort_field', 'created_at');
        if (! in_array($sort_field, ['name', 'created_at'])) {
            $sort_field = 'created_at';
        }

        $query->with(['user'])
            ->orderBy($sort_field, $sort_direction)
            ->search(trim($search_term));
    }
}
