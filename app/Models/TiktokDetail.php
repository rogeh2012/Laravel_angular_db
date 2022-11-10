<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TikTokDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'campaign_id',
        'tt_posts_imgs',
        'tt_posts_vids',
        'tt_stories_imgs',
        'tt_stories_vids',
        'tt_vids',
        'tt_vids_duration',
        'tt_hashtags',
        'tt_tags'
    ];
}
