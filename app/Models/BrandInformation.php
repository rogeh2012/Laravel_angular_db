<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandInformation extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand_id',
        'about',
        'industries',
        'location',
        'facebook',
        'tiktok',
        'youtube',
    ];
}
