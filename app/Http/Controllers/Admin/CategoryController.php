<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Services\Admin\CategoryService;


class CategoryController extends Controller
{

    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        //
        $table_data_url = $this->categoryService->getUrlForDataTable();
        return view('admin.categories.index', compact('table_data_url'));
    }

    public function getAllCategories()
    {

        return $this->categoryService->getAllCategories();
    }

    public function create()
    {
        //
    }

    public function store(CategoryRequest $request)
    {
        //
        return $this->categoryService->store($request);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(CategoryRequest $request, $id)
    {
        //
        return $this->categoryService->update($request, $id);
    }

    public function destroy($id)
    {
        //
        return $this->categoryService->destroy($id);
    }
}
