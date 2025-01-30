<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function categories()  {
        return $this->belongsToMany(Category::class, 'subscriptions')->withTimestamps();
    }
    public function subscribeToCategory($categoryId)  {
        return $this->categories()->attach($categoryId);
    }
    public function unsubscribeToCategory($categoryId)  {
        return $this->categories()->detach($categoryId);
    }

    public function isSubscribeToCategory($categoryId) {
        return $this->categories()->where('category_id', $categoryId)->exists();
    }
}
