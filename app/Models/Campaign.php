<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    public function influencers()
    {
        return $this->belongsToMany(Influencer::class);

    }

    public function instagramDetail()
    {
        return $this->hasOne(InstagramDetail::class);
    }

    public function tiktokDetail()
    {
        return $this->hasOne(TiktokDetail::class);
    }

    protected $fillable = [
        'title',
        'type',
        'country',
        'details',
        'start_date',
        'privacy',
        'instagram',
        'tiktok',
        'image'
    ];
}
