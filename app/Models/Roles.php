<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRoles;

class Roles extends SpatieRoles
{
    public function scopeSearch($query, $term)
    {
        $term = "%$term%";

        $query->where(function ($query) use ($term) {
            $query->where('name', 'like', $term);
        });
    }

    public function scopeRoleQuery($query)
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

        $query->with(['permissions', 'users'])
            ->withCount(['permissions', 'users'])
            ->orderBy($sort_field, $sort_direction)
            ->search(trim($search_term));
    }
}
