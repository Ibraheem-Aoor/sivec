<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

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
        'status',
    ];



    public function category() : BelongsTo
    {
        return $this->belongsTo(ProjectCategory::class , 'category_id');
    }

    public function client() : BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id');
    }



    /**
     *  get the image url
     * @return \url
     */
    public function getHomeImage()
    {
        return Storage::url("projects/{$this->id}/home/{$this->home_image}");
    }

    public function getImage()
    {
        return Storage::url("projects/{$this->id}/main/{$this->image}");
    }

    public function getRleatedProjects()
    {
        $related_projects = self::query()->with(['category' , 'client'])->whereCategoryId($this->category->id)->where('id', '!=', $this->id);
        if($related_projects->count() > 0)
        {
            $related_projects = $related_projects->orderByDesc('created_at')->limit(6)->get();
        }else{
            $related_projects = self::query()->with(['category' , 'client'])->inRandomOrder()->orderByDesc('created_at')->limit(6)->get();
        }
        return $related_projects;
    }

    public function getRoute()
    {
        return route('site.project.details' , encrypt($this->id));
    }

    public function getEncId()
    {
        return encrypt($this->id);
    }


}


