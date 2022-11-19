<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'fname',
        'campaign',
        'influencer',
        'amount',
        'service_fee',
        'vat',
        
    ];
}
