<?php

namespace App\Actions\Update;

class UpdateCategoryAction
{
    public function execute($category, $request)
    {
        $category->update([
            'name' => $request->name,
            'details' => $request->details,
        ]);
    }
}
