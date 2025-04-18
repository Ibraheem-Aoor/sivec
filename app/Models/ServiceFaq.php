<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class ServiceFaq extends Model implements TranslatableContract
{
    use HasFactory , Translatable;
    protected $guarded = [];
    protected $with = [
        'translations'
    ];
    public $translatedAttributes = [
        'question',
        'answer'
    ];
}
