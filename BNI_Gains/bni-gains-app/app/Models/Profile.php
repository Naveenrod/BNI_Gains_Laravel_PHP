<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'title',
        'logo',
        'status',
        'hostname',
        'slug',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($profile) {
            if (empty($profile->slug)) {
                $profile->slug = Str::slug($profile->title) . '-' . Str::random(8);
            }
            if (empty($profile->hostname)) {
                $profile->hostname = $profile->slug . '.profiles.com';
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bniGainsProfile()
    {
        return $this->hasOne(BniGainsProfile::class);
    }

    public function getPublicUrlAttribute()
    {
        return route('public.profile', $this->slug);
    }
}