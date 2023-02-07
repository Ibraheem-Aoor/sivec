<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageCategory extends Model
{

    use HasFactory;

    protected $table = 'image_categories';

    protected $fillable = [
        'name',
        'parent_id',
    ];




    public function subCategories()
    {
        return self::query()->where('parent_id' , $this->id)->get();
    }

    public function hasSubCategories() : bool
    {
        return self::query()->where('parent_id', $this->id)->count() > 0;
    }

    public function getUrl()
    {
        return route('site.gallery', encrypt($this->id));
    }

    public function getParentCategoryName()
    {
        return self::query()->find($this->parent_id)?->name ?? null;
    }

    public function getFullPath()
    {
        $full_path  =   $this->name;
        if(!is_null($this->getParentCategoryName()))
        {
            return $this->getParentCategoryName() .  '/' .  $full_path  ;
        }
        return $full_path;
    }

    public function getFullTitle()
    {
        return $this->getFullPath(); #str_replace($this->getFullPath(), '/', '-');
    }
}
