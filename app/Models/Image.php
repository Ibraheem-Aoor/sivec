<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image_category_id',
    ];

    protected $table = 'images';


    public function category() : BelongsTo
    {
        return $this->belongsTo(ImageCategory::class , 'image_category_id');
    }



    public function getUrl()
    {
        $category_full_path = $this->category->getFullPath();
        $image = $this->name;
        return Storage::url("gallery/{$category_full_path}/{$image}");
    }
}
