<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaeamMemmber extends Model
{
    use HasFactory;

    protected $table = 'team_members';

    protected $fillable = [
        'avatar',
        'name',
        'title_position',
        'email',
        'phone',
        'address',
        'cover_letter',
        'personal_details',
        'facebook',
        'instagram',
        'twitter',
        'linked_in',
        'status',
        'show_in_home',
    ];
}
