<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
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
            'fname' => $this->fname,
            'lname' => $this->lname,
            'email' => $this->email,
            'password' => $this->password,
            'phone' => $this->phone,
            'hear_about_us' => $this->hear_about_us,
            'brand_name' => $this->brand_name,
            'job_title' => $this->job_title,
            'instagram' => $this->instagram,
            'snapchat' => $this->snapchat,
            'brand_info' => new brandInformationResource($this->brandInformation),
        ];
    }
}
