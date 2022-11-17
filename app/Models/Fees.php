<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fees extends Model
{
    use HasFactory;
    protected $fillable = [
        'campaign_id',
        'fees_amount',
        'fees_details'
    ];
}
