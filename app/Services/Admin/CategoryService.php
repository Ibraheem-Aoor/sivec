<?php 

namespace App\Services\Admin;

use App\Repositories\Admin\CategoryRepository;
use Yajra\DataTables\Facades\DataTables;
use Throwable;

class CategoryService{

    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getUrlForDataTable(){
        return route('admin.categories.table_data');
    }

    public function getAllCategories()
    {

        $categories = $this->categoryRepository->getAllCategories();
        return DataTables::of($categories)
            ->addIndexColumn()
            ->addColumn('title', function ($category) {
                return $category->translate(Config('app.locale'))->title;
            })
            ->addColumn('actions', function ($category) {
                return view('Admin.categories.actions', compact('category'));
            })
            ->make(true);
    }

    public function store($request)
    {
        //
        try {
            $this->categoryRepository->store($request);
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
            $category = $this->categoryRepository->getCategoryById($id);
            $this->categoryRepository->update($category, $request);

            $response_data['status'] = true;
            $response_data['message'] = __('custom.create_success');
            $response_data['refresh_table'] = true;
            $response_data['reset_form'] = true;
            $response_data['modal_to_hiode'] = '#exampleModalEdit'.$category->id;
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
            $category = $this->categoryRepository->getCategoryById($id);
            $this->categoryRepository->destroy($category);
            $respnse_data['status'] = true;
            $respnse_data['is_deleted'] = true;
            $respnse_data['message'] = __('custom.deleted_successflly');
            $respnse_data['row'] = $id;
            $response_data['modal_to_hiode'] = '#exampleModalDelete'.$category->id;
            $error_no = 200;
        } catch (Throwable $e) {
            $respnse_data['message'] = _('custom.smth_wrong');
            $error_no = 500;
        }
        return response()->json($respnse_data, $error_no);
    }
}