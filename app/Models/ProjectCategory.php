<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProjectCategory extends Model implements TranslatableContract
{
    use HasFactory, Translatable;


    protected $fillable = [
        'parent_id',
        'status',
    ];

    protected $with = [
        'translations',
    ];

    public $translatedAttributes = [
        'name',
    ];


    public function subCategories() : HasMany
    {
        return $this->hasMany(self::class , 'parent_id');
    }

    public function isSubCategory() : bool
    {
        return isset($this->parent_id);
    }


}
