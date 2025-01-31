<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\CompanyFactory> */
    use HasFactory;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    protected $fillable = [
        'name',
        'email',
        'password',
        'contact_number',
        'website_link',
        'address',
        'description',
        'plan_name'
    ];
    public function approvedBy()
    {
        return $this->belongsTo(Admin::class, 'approved_by');
    }

    public function isFreePlan()  {
        return $this->plan_name = 'free';
    }
    public function isPremiumPlan()  {
        return $this->plan_name = 'premium';
    }

    

}
