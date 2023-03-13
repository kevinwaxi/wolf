<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Get all of the devices   for the Category
     */
    public function devices(): HasMany
    {
        return $this->hasMany(Device::class);
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";

        $query->where(function ($query) use ($term) {
            $query->where('name', 'like', $term);
        });
    }

    public function scopeCategoryQuery($query)
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

        $query->with(['devices'])
            ->orderBy($sort_field, $sort_direction)
            ->search(trim($search_term));
    }
}
