<?php

namespace App\Repositories\Admin;

use App\Models\Category;

class CategoryRepository
{

    public function getAllCategories()
    {
        return Category::all();
    }

    public function store($request)
    {
        //
        return Category::create([
            'title:ar' => $request->title_ar,
            'title:en' => $request->title_en,
        ]);
    }

    public function getCategoryById($id)
    {
        return Category::find($id);
    }

    public function update($category, $request)
    {
        $category->translateOrNew('ar')->title = $request->title_ar;
        $category->translateOrNew('en')->title = $request->title_en;
        return $category->save();
    }

    public function destroy($category){
        return $category->delete();
    }
}
