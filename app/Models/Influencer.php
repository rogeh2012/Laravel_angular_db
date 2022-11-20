<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Influencer extends Model
{
    use HasApiTokens, HasFactory,Authenticatable;


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
