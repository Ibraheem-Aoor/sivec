<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobPosition extends Model
{
    use HasFactory;
    protected $fillable = [
        'vacancy',
        'description',
        'requirements',
        'benefits',
        'salary',
        'is_salary_visible',
        // 'job_title_id',
        // 'status'
    ];



    ######### START REALTIONS ############
    public function title() : BelongsTo
    {
        return $this->belongsTo(JobTitle::class, 'job_title_id');
    }
    ######### END REALTIONS ############
}
