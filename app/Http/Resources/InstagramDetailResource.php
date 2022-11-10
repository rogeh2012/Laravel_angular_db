<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InstagramDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'campaign_id' => $this->campaign_id,
            'ig_posts_imgs' => $this->ig_posts_imgs,
            'ig_posts_vids' => $this->ig_posts_vids,
            'ig_stories_imgs' => $this->ig_stories_imgs,
            'ig_stories_vids' => $this->ig_stories_vids,
            'ig_reels' => $this->ig_reels,
            'ig_reel_duration' => $this->ig_reel_duration,
            'ig_hashtags' => $this->ig_hashtags,
            'ig_tags' => $this->ig_tags,
        ];
    }
}

