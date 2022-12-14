<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    public function instagramDetail()
    {
        return $this->hasOne(InstagramDetail::class);
    }

    public function tiktokDetail()
    {
        return $this->hasOne(TiktokDetail::class);
    }

    public function fees()
    {
        return $this->hasOne(Fees::class);
    }

    public function influencer()
    {
        return $this->hasOne(Influencer::class);
    }

    protected $fillable = [
        'title',
        'brand_id',
        'type',
        'country',
        'details',
        'start_date',
        'privacy',
        'instagram',
        'tiktok',
        'image',
        'pending',
        'completed',
        'drafts'
    ];
}
