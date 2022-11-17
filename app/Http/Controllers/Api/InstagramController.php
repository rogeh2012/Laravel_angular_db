<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\InstagramDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstagramController extends Controller
{
    public function store()
        {
    $data = request()->all();
    $instagram = InstagramDetail::create([
        'campaign_id' => $data['campaign_id'],
        'ig_posts_imgs' => $data['ig_posts_imgs'],
        'ig_posts_vids' => $data['ig_posts_vids'],
        'ig_stories_imgs' => $data['ig_stories_imgs'],
        'ig_stories_vids' => $data['ig_stories_vids'],
        'ig_reels' => $data['ig_reels'],
        'ig_reel_duration' => $data['ig_reel_duration'],
        'ig_hashtags' => $data['ig_hashtags'],
        'ig_tags' => $data['ig_tags'],
    ]);
    return($instagram);
}

public function update($campaignId)
{

    $instagram = InstagramDetail::where('campaign_id', $campaignId)->first();

    $instagram = DB::table('instagram_details')
    ->where('campaign_id', $campaignId)
    ->updateOrInsert(
        ['campaign_Id' => $campaignId],
        ['ig_posts_imgs'=> request()->ig_posts_imgs,
        'ig_posts_vids'=> request()->ig_posts_vids,
        'ig_stories_imgs'=> request()->ig_stories_imgs ,
        'ig_stories_vids'=> request()->ig_stories_vids,
        'ig_reels'=> request()->ig_reels,
        'ig_reel_duration'=> request()->ig_reel_duration,
        'ig_hashtags' =>request()->ig_hashtags,
        'ig_tags'=> request()->ig_tags
        ]);

    return ($instagram);
}

}
