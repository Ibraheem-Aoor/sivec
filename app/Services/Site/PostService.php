<?php 

namespace App\Services\Site;

use App\Repositories\Site\PostRepository;
use Illuminate\Support\Facades\Cache;


class PostService{
    private $postRepository;

    public function __construct(PostRepository $postRepository){
        $this->postRepository = $postRepository;
    }

    public function getPosts(){
        $data['page_title'] = __('custom.site.sivec') . ' - ' . __('custom.site.BLOG');
        $data['items'] = $this->postRepository->getPosts();
        return $data;
    }

    public function posts_with_sidebar()
    {
        $data['page_title'] = __('custom.site.sivec') . ' - ' . __('custom.site.BLOG');
        $data['items'] = $this->postRepository->getPosts();
        $data['categories'] = Cache::remember('categories', 60, function () {
            return $this->postRepository->getCategories();
        });
        $data['tags'] = Cache::remember('tags', 60, function () {
            return $this->postRepository->getTags();
        });
        $data['popular_posts'] = Cache::remember('popular_posts', 60, function () {
            return $this->postRepository->getPopularPosts();
        });
        return $data;
    }

    public function getPost($id)
    {
        $data['page_title'] = __('custom.site.sivec') . ' - ' . __('custom.site.BLOG');
        $data['post'] = $this->postRepository->getPost($id);
        $data['categories'] = Cache::remember('categories', 60, function () {
            return $this->postRepository->getCategories();
        });
        $data['tags'] = Cache::remember('tags', 60, function () {
            return $this->postRepository->getTags();
        });
        $data['popular_posts'] = Cache::remember('popular_posts', 60, function () {
            return $this->postRepository->getPopularPosts();
        });
        return $data;
    }

    public function search($request)
    {
        $data['page_title'] = __('custom.site.sivec') . ' - ' . __('custom.site.BLOG');
        $data['items'] = $this->postRepository->getSearchedPosts($request);
        $data['categories'] = Cache::remember('categories', 60, function () {
            return $this->postRepository->getCategories();
        });
        $data['tags'] = Cache::remember('tags', 60, function () {
            return $this->postRepository->getTags();
        });
        $data['popular_posts'] = Cache::remember('popular_posts', 60, function () {
            return $this->postRepository->getPopularPosts();
        });
        return $data;
    }

    public function getPostsByCategory($id)
    {
        $data['items'] = $this->postRepository->getPostsByCategory($id);

        $data['page_title'] = __('custom.site.sivec') . ' - ' . __('custom.site.BLOG');
        $data['categories'] = Cache::remember('categories', 60, function () {
            return $this->postRepository->getCategories();
        });
        $data['tags'] = Cache::remember('tags', 60, function () {
            return $this->postRepository->getTags();
        });
        $data['popular_posts'] = Cache::remember('popular_posts', 60, function () {
            return $this->postRepository->getPopularPosts();
        });
        return $data;
    }

    public function getPostsByTag($id)
    {
        $data['items'] = $this->postRepository->getPostsByTag($id);

        $data['page_title'] = __('custom.site.sivec') . ' - ' . __('custom.site.BLOG');
        $data['categories'] = Cache::remember('categories', 60, function () {
            return $this->postRepository->getCategories();
        });
        $data['tags'] = Cache::remember('tags', 60, function () {
            return $this->postRepository->getTags();
        });
        $data['popular_posts'] = Cache::remember('popular_posts', 60, function () {
            return $this->postRepository->getPopularPosts();
        });
        return $data;
    }

    public function increaseViews($id){
        $post = $this->postRepository->getPost($id);
        $post = $this->postRepository->increaseViews($post);
        return $post;
    }
}