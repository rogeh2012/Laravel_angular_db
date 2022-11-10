<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TikTokDetail;
use Illuminate\Http\Request;

class TikTokController extends Controller
{
    public function store()
        {
    $data = request()->all();
    $tiktok = TikTokDetail::create([
        'campaign_id' => $data['campaign_id'],
        'tt_posts_imgs' => $data['tt_posts_imgs'],
        'tt_posts_vids' => $data['tt_posts_vids'],
        'tt_stories_imgs' => $data['tt_stories_imgs'],
        'tt_stories_vids' => $data['tt_stories_vids'],
        'tt_vids' => $data['tt_vids'],
        'tt_vids_duration' => $data['tt_vids_duration'],
        'tt_hashtags' => $data['tt_hashtags'],
        'tt_tags' => $data['tt_tags'],

    ]);
    return($tiktok);
}
}
