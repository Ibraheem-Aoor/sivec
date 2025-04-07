<?php 

namespace App\Repositories\Site;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class PostRepository{
    public function getPosts(){
        return Post::with(['translations' , 'category' , 'image'])->where('is_available' , '1')->latest()->paginate(9);
    }

    public function getCategories(){
        return Category::with(['translations'  ,'posts'])->withCount('posts')->latest()->get();
    }

    public function getTags(){
        return Tag::with(['translations'])->get();
    }

    public function getPopularPosts(){
        return Post::with(['translations' , 'category' , 'image'])->orderBy('num_of_views', 'desc')->where('is_available' , '1')->limit(3)->get();
    }

    public function getPost($id){
        return Post::with('category' , 'image')->find($id);
    }

    public function getSearchedPosts($request){
        return Post::with(['translations', 'category', 'image'])
            ->whereHas('translations', function ($query) use ($request) {
                $query->where('locale', app()->getLocale())
                    ->where(function ($query) use ($request) {
                        $query->where('title', 'like', '%' . $request->key . '%')
                            ->orWhere('description', 'like', '%' . $request->key . '%');
                    });
            })->where('is_available' , '1')
            ->latest()
            ->paginate(9);
    }

    public function getPostsByCategory($id){
        return Post::where('category_id', $id)->with(['translations', 'category', 'image'])->where('is_available' , '1')->paginate(9);
    }

    public function getPostsByTag($id){
        return Post::whereHas('tags', function ($query) use ($id) {
            $query->where('tags.id', $id);
        })
            ->with(['translations', 'category.translations', 'image'])->where('is_available' , '1')->paginate(9);
    }
}