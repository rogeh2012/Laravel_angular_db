<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TikTokDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

public function update($campaignId)
{

    // $tiktok = TiktokDetail::where('campaign_id', $campaignId);

    // $tiktok->campaign_id = request()->campaign_id;
    // $tiktok->tt_posts_imgs = request()->tt_posts_imgs;
    // $tiktok->tt_vids_imgs = request()->tt_vids_imgs;
    // $tiktok->tt_stories_imgs = request()->tt_stories_imgs ;
    // $tiktok->tt_stories_vids = request()->tt_stories_vids;
    // $tiktok->tt_vids = request()->tt_vids;
    // $tiktok->tt_vids_duration = request()->tt_vids_duration;
    // $tiktok->tt_hashtags = request()->tt_hashtags;
    // $tiktok->tt_tags = request()->tt_tags;

    // $tiktok->save();

    $tiktok = DB::table('tik_tok_details')
    ->where('campaign_id', $campaignId)
    ->update([
        'campaign_Id' => $campaignId,
        'tt_posts_imgs'=> request()->tt_posts_imgs,
        'tt_posts_vids'=> request()->tt_posts_vids,
        'tt_stories_imgs'=> request()->tt_stories_imgs ,
        'tt_stories_vids'=> request()->tt_stories_vids,
        'tt_vids'=> request()->tt_vids,
        'tt_vids_duration'=> request()->tt_vids_duration,
        'tt_hashtags' =>request()->tt_hashtags,
        'tt_tags'=> request()->tt_tags]);

    return ($tiktok);
}
}
