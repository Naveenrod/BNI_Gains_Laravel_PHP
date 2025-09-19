<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BniGainsProfile extends Model
{
    use HasFactory;
    protected $table = 'bni_gains_profile';


    protected $fillable = [
        'profile_id',
        'goals_intro',
        'goals_input',
        'accomplishments_intro',
        'accomplishments_input',
        'interests_intro',
        'interests_input',
        'networks_intro',
        'networks_input',
        'skills_intro',
        'skills_input',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id');
    }
}