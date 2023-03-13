<?php

namespace App\Models;

use Spatie\Permission\Models\Permission as SpatiePermissions;

class Permissions extends SpatiePermissions
{
    public function scopeSearch($query, $term)
    {
        $term = "%$term%";

        $query->where(function ($query) use ($term) {
            $query->where('name', 'like', $term)
                ->orWhereHas('roles', function ($query) use ($term) {
                    $query->where('name', 'like', $term);
                });
        });
    }

    public function scopePermissionQuery($query)
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

        $query->withCount('roles')
            ->orderBy($sort_field, $sort_direction)
            ->search(trim($search_term));
    }
}
