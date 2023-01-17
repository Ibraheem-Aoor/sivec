<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'home_image',
        'name',
        'features',
        'budget',
        'basic_info',
        'challenge',
        'result',
        'achieve_date',
        'category_id',
        'client_id',
    ];



    public function category() : BelongsTo
    {
        return $this->belongsTo(ProjectCategory::class , 'category_id');
    }

}


