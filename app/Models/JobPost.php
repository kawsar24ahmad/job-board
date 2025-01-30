<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'job_type', 
        'application_link',
        'expire_date',
        'status',
        'category_id'
    ];

    protected $casts = [
        'expire_date' => 'datetime'
    ];

    public function company()  {
        return $this->BelongsTo(Company::class);
    }
    public function category()  {
        return $this->BelongsTo(Category::class);
    }
}
