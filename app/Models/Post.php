<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;



class Post extends Model
{
    use Translatable;

    protected $fillable = ['title' , 'description' , 'category_id' , 'num_of_views' , 'image' , 'is_available'];

    public $translatedAttributes = ['title' , 'description'];

    protected function isAvailable(): Attribute
    {
        return Attribute::make(
            get: fn ( $value) => $value ? __('blog.active') : __('blog.inactive'),
        );
    }


    public function translations()
    {
        return $this->hasMany(PostTranslation::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }


    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function image(){
        return $this->hasOne(PostImage::class);
    }

}
