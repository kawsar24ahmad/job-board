<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'name'
    ];
    public function jobPosts() {
        return $this->hasMany(JobPost::class);
    }
    public function admin() {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
    public function users()  {
        return $this->belongsToMany(User::class, 'subscriptions')->withTimestamps();
    }
}
