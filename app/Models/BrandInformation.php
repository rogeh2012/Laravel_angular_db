<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandInformation extends Model
{
    use HasFactory;
    
   
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
