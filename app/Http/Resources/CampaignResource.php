<?php

namespace App\Http\Resources;

use App\Models\InstagramDetail;
use Illuminate\Http\Resources\Json\JsonResource;

class CampaignResource extends JsonResource
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
            'id' => $this->id,
            'brand_id'=>$this->brand_id,
            'title' => $this->title,
            'type' => $this->type,
            'country' => $this->country,
            'details' => $this->details,
            'start_date' => $this->start_date,
            'privacy' => $this->privacy,
            'instagram' => $this->instagram,
            'tiktok' => $this->tiktok,
            'image' => $this->image,
            'pending' => $this->pending,
            'completed' => $this->completed,
            'drafts' => $this->drafts,
            'instagram_info' => new InstagramDetailResource($this->instagramDetail),
            'tiktok_info' => new TiktokDetailResource($this->tiktokDetail),
            'fees_info' => new FeesResource($this->fees)
        ];
    }
}
