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
    public function brandInformation(){
        return $this->hasOne(BrandInformation::class);
    }
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'phone',
        'password',
        'hear_about_us',
        'brand_name',
        'instagram',
        'job_title',
    ];
}
//fillable

