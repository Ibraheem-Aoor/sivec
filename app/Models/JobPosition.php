<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobPosition extends Model
{
    use HasFactory;

    protected $table = 'job_positions';
    protected $fillable = [
        'vacancy',
        'description',
        'requirements',
        'benefits',
        'salary',
        'is_salary_visible',
        'job_title_id',
        'status'
    ];



    ######### START REALTIONS ############
    public function title() : BelongsTo
    {
        return $this->belongsTo(JobTitle::class, 'job_title_id');
    }
    ######### END REALTIONS ############

    public function getRoute()
    {
        return route('site.job_details', encrypt($this->id));
    }

    public function getRleatedJobs()
    {
        $related_jobs = self::query()->where('job_title_id', $this->job_title_id)->limit(4)->get();
        return $related_jobs;
    }

    public function getRequirements()
    {
        $requirments = json_decode($this->requirements , true);
        return $requirments ?? [];
    }
}
