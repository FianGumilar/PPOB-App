<?php

namespace App\Services;

use App\Models\ProductCategory;

class CategoryService
{
    public function getData($request)
    {
        $search = $request->search;

        $query = ProductCategory::query();

        $query->when(request('search', false), function ($q) use ($search) {
            $q->where('name', 'like', '%' . $search . '%');
        });

        return $query->paginate(10);
    }

    public function createData($request)
    {
        $inputs = $request->only(['name', 'description']);
        $category = ProductCategory::create($inputs);

        return $category;
    }

    public function deleteData($id)
    {
        $category = ProductCategory::findOrFail($id);
        $category->delete();

        return $category;
    }

    public function updateData($id, $request)
    {
        $inputs = $request->only(['name', 'description']);

        $category = ProductCategory::findOrFail($id);
        $category->update($inputs);

        return $category;
    }
}
