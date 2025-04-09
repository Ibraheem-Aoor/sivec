<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Services\Site\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    //
    private $postService;
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }
    public function index()
    {
        $data = $this->postService->getPosts();
        return view('site.blog.index', $data);
    }

    public function posts_with_sidebar()
    {
        $data = $data = $this->postService->posts_with_sidebar();
        return view('site.blog.posts_with_sidebar', $data);
    }

    public function post_details($id)
    {
        $data = $this->postService->getPost($id);
        $post = $this->postService->increaseViews($id);
        return view('site.blog.post_details', $data);
    }

    public function search(Request $request)
    {
        $data = $this->postService->search($request);
        return view('site.blog.index', $data);
    }


    public function getPostsByCategory($id)
    {
        $data = $this->postService->getPostsByCategory($id);
        return view('site.blog.posts_with_sidebar', $data);
    }

    public function getPostsByTag($id)
    {
        $data = $this->postService->getPostsByTag($id);
        return view('site.blog.posts_with_sidebar', $data);
    }
}
