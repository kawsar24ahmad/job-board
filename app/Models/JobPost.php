<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    /** @use HasFactory<\Database\Factories\JobPostFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'company_id',
        'description',
        'tags',
        'salary_range',
        'location',
        'application_link',
        'expire_date',
    ];

    protected $casts = [
        'expire_date' => 'datetime'
    ];
}
