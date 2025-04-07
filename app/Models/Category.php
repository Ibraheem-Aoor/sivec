<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Category extends Model
{
    use Translatable;

    protected $fillable = ['title'];

    public $translatedAttributes = ['title'];

    public function translations(): HasMany
    {
        return $this->hasMany(CategoryTranslation::class);
    }



    public function posts(){
        return $this->hasMany(Post::class , 'category_id');
    }
}
