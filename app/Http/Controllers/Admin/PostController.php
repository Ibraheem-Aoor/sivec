<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Services\Admin\PostService;
use Illuminate\Http\Request;



class PostController extends Controller
{
    private $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $data['table_data_url'] = route('admin.posts.table_data');
        return view('admin.posts.index', $data);
    }

    public function getAllPosts()
    {
        return $this->postService->getPosts();
    }
    public function create()
    {
        //
        $categories = $this->postService->getCategories();
        $tags = $this->postService->getTags();
        return view('admin.posts.create', compact(['categories', 'tags']));
    }

    public function store(PostRequest $request)
    {
        //
        $data = $this->postService->store($request);
        $response_data = $data['response_data'];
        $error_no = $data['error_no'];
        return response()->json($response_data, $error_no);
    }

    public function show($id)
    {
        //
        $post = $this->postService->getPost($id);
        return view('admin.posts.show', compact('post'));
    }


    public function edit($id)
    {
        //
        $post = $this->postService->getPost($id);
        $categories = $this->postService->getCategories();
        $tags = $this->postService->getTags();
        return view('admin.posts.edit', compact(['post' , 'tags' , 'categories']));
    }


    public function update(Request $request, $id)
    {
        //
        $data = $this->postService->update($request , $id);
        $response_data = $data['response_data'];
        $error_no = $data['error_no'];
        return response()->json($response_data, $error_no);
    }


    public function destroy($id)
    {
        //
        $data = $this->postService->destroy($id);
        $response_data = $data['response_data'];
        $error_no = $data['error_no'];
        return response()->json($response_data, $error_no);
    }

    public function changeStatus($id)
    {
        $this->postService->changeStatus($id);
        return redirect()->back();
    }
}
