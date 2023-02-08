<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessSetting extends Model
{
    use HasFactory;

    public $translatedAttributes = ['value'];

    protected $fillable = [
        'key',
        'value',
        'page',
        'lang'
    ];
}
