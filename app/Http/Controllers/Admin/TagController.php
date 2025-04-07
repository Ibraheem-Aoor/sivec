<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TagRequest;
use App\Services\Admin\TagService;
use Illuminate\Http\Request;

class TagController extends Controller
{
    private $tagService;

    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }

    public function index()
    {
        //
        $table_data_url = $this->tagService->getUrlForDataTable();
        return view('admin.tags.index', compact('table_data_url'));
    }

    public function getAllTags()
    {

        return $this->tagService->getAllTags();
    }

    public function create()
    {
        //
    }

    public function store(TagRequest $request)
    {
        //
        return $this->tagService->store($request);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(TagRequest $request, $id)
    {
        //
        return $this->tagService->update($request, $id);
    }

    public function destroy($id)
    {
        //
        return $this->tagService->destroy($id);
    }
}
