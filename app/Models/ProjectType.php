<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model implements TranslatableContract
{
    use HasFactory , Translatable;

    protected $guarded = [];
    protected $with = ['translations'];

    public $translatedAttributes = ['name'];

    public function getPageTitle()
    {
        return __('custom.projects.projects_types');
    }

}
