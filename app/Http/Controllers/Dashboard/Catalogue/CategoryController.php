<?php

namespace App\Http\Controllers\Dashboard\Catalogue;

use App\Actions\Store\StoreCategoryAction;
use App\Actions\Update\UpdateCategoryAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Store\StoreCategoryRequest;
use App\Http\Requests\Update\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $perPage = request()->input('perPage') ?: 10;
        $categories = Category::categoryQuery()->paginate($perPage);

        return view('pages.dashboard.catalogue.category.category_list', compact('categories'));
    }

    public function create()
    {
        return view('pages.dashboard.catalogue.category.create');
    }

    public function store(StoreCategoryRequest $request, StoreCategoryAction $action)
    {
        $action->execute($request);

        return redirect()
            ->route('dashboard.catalogue.categories.index')
            ->withSuccess(__('Category created successfully.'));
    }

    public function show(Category $category)
    {
        return view('pages.dashboard.catalogue.category.category', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('pages.dashboard.catalogue.category.update', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category, UpdateCategoryAction $action)
    {
        $action->execute($request, $category);

        return redirect()
        ->route('dashboard.catalogue.categories.index')
        ->withSuccess(__('Updated category successfully'));
    }

    public function destroy(Category $category)
    {
        $category->delete();
    }
}
