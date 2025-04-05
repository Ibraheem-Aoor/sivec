<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceCategory extends Model implements TranslatableContract
{
    use HasFactory , Translatable;

    protected $fillable = [
        'status',
    ];

    protected $with = ['translations'];

    public $translatedAttributes = [
        'name',
    ];


    ###### START RELATIONS ######
    public function services() : HasMany
    {
        return $this->hasMany(Service::class, 'category_id');
    }
    ###### END RELATIONS ######


}
