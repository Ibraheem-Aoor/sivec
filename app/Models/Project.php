<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model implements TranslatableContract
{
    use HasFactory, Translatable;


    protected $guarded = [];
    protected $with = [
        'translations',
        'category',
    ];

    public $translatedAttributes = [
        'name',
        'features',
        'basic_info',
        'challenge',
        'result'
    ];

    #### START RELATIONS ####
    /**
     * Direct Category Of The Project
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(ProjectCategory::class, 'category_id');
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id');
    }


    public function type(): BelongsTo
    {
        return $this->belongsTo(ProjectType::class, 'project_type_id');
    }
    public function style(): BelongsTo
    {
        return $this->belongsTo(ProjectStyle::class, 'project_style_id');
    }


    public function images(): HasMany
    {
        return $this->hasMany(ProjectImage::class);
    }

    #### END RELATIONS ####


    public function getBaseCategory(): ProjectCategory
    {
        return $this->category->getBaseCategory();
    }


    /**
     * This function is used to display the name of the project well
     * in home page. so if there is a baseCategory. we display the directCategory name of the project.
     * else we are displaying the project's name becauses there will be no parentCategories for it's DirectCategory :)
     */
    public function getNameOrDirectCategoryName(): string
    {
        if ($this->getBaseCategory() != null) {
            return $this->category->name;
        } else {
            return $this->name;
        }
    }


    public function saveGalleryImages($gallery_images = [])
    {
        foreach ($gallery_images as $gallery_image => $file) {
            $saved_image = saveImage('projects/' . $this->id . '/gallery' . '/', $file);
            $this->images()->create([
                'name' => $saved_image
            ]);
        }
    }


    public function getUrl()
    {
        return route('site.project_details' , $this->getEncId());
    }

    public function getEncId()
    {
        return encrypt($this->id);
    }




}


