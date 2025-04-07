<?php 

namespace App\Repositories\Admin;

use App\Models\Tag;

class TagRepository{
    public function getAllTags()
    {
        return Tag::all();
    }

    public function store($request)
    {
        //
        return Tag::create([
            'title:ar' => $request->title_ar,
            'title:en' => $request->title_en,
        ]);
    }

    public function getTagById($id)
    {
        return Tag::find($id);
    }

    public function update($tag, $request)
    {
        $tag->translateOrNew('ar')->title = $request->title_ar;
        $tag->translateOrNew('en')->title = $request->title_en;
        return $tag->save();
    }

    public function destroy($tag){
        return $tag->delete();
    }
}