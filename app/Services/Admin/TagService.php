<?php

namespace App\Services\Admin;

use App\Repositories\Admin\TagRepository;
use Yajra\DataTables\Facades\DataTables;
use Throwable;

class TagService{
    private $tagRepository;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function getUrlForDataTable(){
        return route('admin.tags.table_data');
    }

    public function getAllTags()
    {

        $tags = $this->tagRepository->getAllTags();
        return DataTables::of($tags)
            ->addIndexColumn()
            ->addColumn('title', function ($tag) {
                return $tag->translate(Config('app.locale'))->title;
            })
            ->addColumn('actions', function ($tag) {
                return view('admin.tags.actions', compact('tag'));
            })
            ->make(true);
    }

    public function store($request)
    {
        //
        try {
            $this->tagRepository->store($request);
            $response_data['status'] = true;
            $response_data['message'] = __('custom.create_success');
            $response_data['refresh_table'] = true;
            $response_data['reset_form'] = true;
            $response_data['modal_to_hiode'] = '#exampleModalCreate';
            $error_no = 200;
        } catch (Throwable $e) {
            $response_data['status'] = false;
            $response_data['message'] = $e->getMessage(); #__('custom.something_wrong');
            $error_no = 500;
        }
        return response()->json($response_data, $error_no);
    }

    public function update($request, $id)
    {
        //
        try {
            $tag = $this->tagRepository->getTagById($id);
            $this->tagRepository->update($tag, $request);

            $response_data['status'] = true;
            $response_data['message'] = __('custom.create_success');
            $response_data['refresh_table'] = true;
            $response_data['reset_form'] = true;
            $response_data['modal_to_hiode'] = '#exampleModalEdit'.$tag->id;
            $error_no = 200;
        } catch (Throwable $e) {
            $response_data['status'] = false;
            $response_data['message'] = $e->getMessage();
            $error_no = 500;
        }
        return response()->json($response_data, $error_no);
    }

    public function destroy($id)
    {
        //
        try {
            $tag = $this->tagRepository->getTagById($id);
            $this->tagRepository->destroy($tag);
            $respnse_data['status'] = true;
            $respnse_data['is_deleted'] = true;
            $respnse_data['message'] = __('custom.deleted_successflly');
            $respnse_data['row'] = $id;
            $response_data['modal_to_hiode'] = '#exampleModalDelete'.$tag->id;
            $error_no = 200;
        } catch (Throwable $e) {
            $respnse_data['message'] = _('custom.smth_wrong');
            $error_no = 500;
        }
        return response()->json($respnse_data, $error_no);
    }
}
