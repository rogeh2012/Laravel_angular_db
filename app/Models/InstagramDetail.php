<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstagramDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'campaign_id',
        'ig_posts_imgs',
        'ig_posts_vids',
        'ig_stories_imgs',
        'ig_stories_vids',
        'ig_reels',
        'ig_reel_duration',
        'ig_hashtags',
        'ig_tags'
    ];
}
