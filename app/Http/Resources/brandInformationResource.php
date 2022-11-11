<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class brandInformationResource extends JsonResource
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
            'brand_id' => $this->brand_id,
            'about' => $this->about,
            'industries' => $this->industries,
            'location' => $this->location,
            'facebook' => $this->facebook,
            'tiktok' => $this->tiktok,
            'youtube' => $this->youtube,
        ];
    }
}
