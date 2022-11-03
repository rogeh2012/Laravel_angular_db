<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Influencer extends Model
{
    use HasFactory;

    public function campaigns()
    {
        return $this->belongsToMany(Campaign::class);
    }

    protected $fillable = [
        'fname',
        'lname',
        'email',
        'phone',
        'password',
        'hear_about_us',
        'occupation',
        'instagram',
        'facebook',
        'snapchat',
        'age',
        'price',
        'engagement_rate',
        'followers',
        'gender',
        'children',
        'country',
    ];
}
