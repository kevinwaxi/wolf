<?php

namespace App\Actions\Store;

use App\Models\Category;

class StoreCategoryAction
{
    public function execute($request)
    {
        Category::create([
            'name' => $request->name,
            'details' => $request->details,
        ]);
    }
}
