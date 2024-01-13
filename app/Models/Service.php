<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;


class Service extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $fillable = [
        'category_id',
        'image',
        'icon',
        'pdf',
        'status'
    ];

    protected $with = [
        'translations',
    ];

    public $translatedAttributes = ['name', 'details'];




    ####### Start Relationbs #######

    public function category(): BelongsTo
    {
        return $this->belongsTo(ServiceCategory::class, 'category_id');
    }
    ####### End Relationbs #######



    /**
     *  get the image url
     * @return \url
     */
    public function getImage()
    {
        return Storage::url("services/{$this->id}/main/{$this->image}");
    }

    public function getRleatedServices()
    {
        $related_services = self::query()->whereCategoryId($this->category->id)->where('id', '!=', $this->id);
        if ($related_services->count() > 0) {
            $related_services = $related_services->orderByDesc('created_at')->get();
        } else {
            $related_services = self::query()->inRandomOrder()->orderByDesc('created_at')->get();
        }
        return $related_services;
    }

    public function getRoute()
    {
        return route('site.service.details', encrypt($this->id));
    }

    public function getEncId()
    {
        return encrypt($this->id);
    }
}
