<?php 

namespace App\Services\Admin;

use App\Repositories\Admin\PostRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Throwable;

class PostService{

    private $PostRepository;

    public function __construct(PostRepository $PostRepository)
    {
        $this->PostRepository = $PostRepository;
    }

    public function getPosts()
    {
        $posts = $this->PostRepository->getPosts();
        return DataTables::of($posts)
            ->addIndexColumn()
            ->addColumn('title', function ($post) {
                return $post->translate(Config('app.locale'))->title;
            })
            ->addColumn('category', function ($post) {
                return $post->category->translate(Config('app.locale'))->title;
            })
            ->addColumn('tags', function ($post) {
                return view('Admin.posts._tags', compact('post'));
            })


            ->addColumn('actions', function ($post) {
                return view('Admin.posts.actions', compact('post'));
            })
            ->make(true);
    }

    public function getCategories(){
        return Cache::remember('categories', 60, function () {
            return $this->PostRepository->getCategories();
        });
    }

    public function getTags(){
        return Cache::remember('tags', 60, function () {
            return $this->PostRepository->getTags();
        });
    }

    public function store($request)
    {
        //
        DB::beginTransaction();
        try {
            $post = $this->PostRepository->storePost($request);
            DB::commit();
            $response_data['message'] = __('custom.create_success');
            $error_no = 200;
        } catch (Throwable $e) {
            $response_data['status'] = false;
            $response_data['message'] = $e->getMessage(); #__('custom.something_wrong');
            $error_no = 500;
        }
        return [
            'response_data' => $response_data, 
            'error_no' => $error_no
        ];
    }

    public function getPost($id){
        return $this->PostRepository->getPost($id);
    }

    public function update($request, $id)
    {
        //
        DB::beginTransaction();
        try {
            $post = $this->PostRepository->getPost($id);

            $post = $this->PostRepository->updatePost($request, $post);
            DB::commit();
            $response_data['status'] = true;
            $response_data['message'] = __('custom.create_success');
            $response_data['refresh_table'] = true;
            $response_data['reset_form'] = true;
            $error_no = 200;
        } catch (Throwable $e) {
            $response_data['status'] = false;
            $response_data['message'] = $e->getMessage(); #__('custom.something_wrong');
            $error_no = 500;
        }
        return [
            'response_data' => $response_data, 
            'error_no' => $error_no
        ];
    }

    public function destroy($id)
    {
        //
        try {
            $post = $this->PostRepository->getPost($id);
            $post = $this->PostRepository->deletePost($post);
            $response_data['status'] = true;
            $response_data['is_deleted'] = true;
            $response_data['message'] = __('custom.deleted_successflly');
            $response_data['row'] = $id;
            $error_no = 200;
            return [
                'response_data' => $response_data, 
                'error_no' => $error_no
            ];
        } catch (Throwable $e) {
            $response_data['message'] = _('custom.smth_wrong');
            $error_no = 500;
            return [
                'response_data' => $response_data, 
                'error_no' => $error_no
            ];
        }
        
    }

    public function changeStatus($id)
    {
        $post = $this->getPost($id);
        return $this->PostRepository->changeStatus($post);
    }

}