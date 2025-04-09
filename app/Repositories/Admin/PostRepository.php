<?php

namespace App\Repositories\Admin;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class PostRepository
{
    public function getPosts()
    {
        return Post::all();
    }

    public function getCategories()
    {
        return Category::all();
    }
    public function getTags()
    {
        return Tag::all();
    }

    public function storePost($request)
    {
        $post = new Post();

        $post->translateOrNew('ar')->title = $request->title_ar;
        $post->translateOrNew('en')->title = $request->title_en;
        $post->translateOrNew('ar')->description = $request->description_ar;
        $post->translateOrNew('en')->description = $request->description_en;
        $post->category_id = $request->category_id;
        $post->save();
        $post->tags()->sync($request->tags);

        $image = $request->file('image');
        $fileName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('uploads/blog', $fileName, ['disk' => 'uploads']);
        $post->image()->create([
            'path' => $fileName,
        ]);

        return $post;
    }

    public function getPost($id)
    {
        return Post::with(['category', 'tags'])->find($id);
    }

    public function updatePost($request, $post)
    {
        $post->translateOrNew('ar')->title = $request->title_ar;
        $post->translateOrNew('en')->title = $request->title_en;
        $post->translateOrNew('ar')->description = $request->description_ar;
        $post->translateOrNew('en')->description = $request->description_en;
        $post->category_id = $request->category_id;
        $post->save();
        $post->tags()->sync($request->tags);
        if ($request->file('image')) {
            Storage::disk('uploads')->delete('uploads/blog/' . $post->image->path);

            $image = $request->file('image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('uploads/blog', $fileName, ['disk' => 'uploads']);
            $post->image()->update([
                'path' => $fileName,
            ]);
        }
        return $post;
    }

    public function deletePost($post){
        Storage::disk('uploads')->delete('uploads/blog/' . $post->image->path);
        return $post->delete();
    }

    public function changeStatus($post)
    {
        $post->is_available = $post->is_available == 'Active' || $post->is_available == 'مفعل' ? 0 : 1;
        return $post->save();
    }

}
