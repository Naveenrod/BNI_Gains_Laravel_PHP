<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'first_name',
        'last_name',
        'email',
        'password',
        // 'address',
        // 'phone',
        // 'linkedin_url',
        // 'twitter_handle',
        // 'instagram_handle',
        // 'facebook_page',
        // 'business_name',
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
    protected $casts =[
            'email_verified_at' => 'datetime',
        ];

    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }

    public function getFullNameAttribute()
    {
        // Option 1: If you have first_name and last_name columns
        if (isset($this->first_name) && isset($this->last_name)) {
            return trim($this->first_name . ' ' . $this->last_name);
        }
        
        // Option 2: If you only have a 'name' column
        return $this->name;
    }
}
