<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TikTokDetailResource extends JsonResource
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
            'tt_posts_imgs' => $this->tt_posts_imgs,
            'tt_posts_vids' => $this->tt_posts_vids,
            'tt_stories_imgs' => $this->tt_stories_imgs,
            'tt_stories_vids' => $this->tt_stories_vids,
            'tt_vids' => $this->tt_vids,
            'tt_vids_duration' => $this->tt_vids_duration,
            'tt_hashtags' => $this->tt_hashtags,
            'tt_tags' => $this->tt_tags,
        ];
    }
}
