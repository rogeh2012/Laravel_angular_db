<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    public function influencers()
    {
        return $this->belongsToMany(Influencer::class);
    }
    protected $fillable = [
        'title',
        'type',
        'country',
        'details',

    ];
}
