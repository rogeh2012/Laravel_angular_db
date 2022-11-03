<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Brand extends Model
{
    use HasFactory;

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
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
    ];
}
//fillable

