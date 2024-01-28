<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProjectCategory extends Model implements TranslatableContract
{
    use HasFactory, Translatable;


    protected $fillable = [
        'parent_id',
        'image',
        'status',
    ];

    protected $with = [
        'translations',
    ];

    public $translatedAttributes = [
        'name',
    ];

    #### START RELATIONS ###
    public function subCategories(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class, 'category_id');
    }

    public function parentCategory(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }
    #### END RELATIONS ###


    public function isSubCategory(): bool
    {
        return isset($this->parent_id);
    }

    public function hasSubCategories(): bool
    {
        return $this->subCategories()->count() > 0;
    }
    public function getUrl()
    {
        return route('site.project_category', $this->getEncryptedId());
    }

    public function getEncryptedId()
    {
        return encrypt($this->id);
    }

    /**
     * Here We are trying to get back to the base category of this category
     * so if we have interior_design->bathrooms->bathrooms_sub
     * we should return interior_design here.
     * note that the bathrooms_sub is the direct category.
     */
    public function getBaseCategory(): ProjectCategory
    {
        $current_category = $this;
        $is_current_category_sub = $current_category->isSubCategory();
        while ($is_current_category_sub) {
            $current_category = $current_category->parentCategory;
            $is_current_category_sub = $current_category->isSubCategory();
        }
        return $current_category;
    }


    public function scopeSub($query)
    {
        return $query->where('parent_id' , '!=' , null);
    }




}
