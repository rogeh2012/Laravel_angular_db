<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Fees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeesController extends Controller
{
    public function store()
        {
    $data = request()->all();
    $fee = Fees::create([
        'campaign_id' => $data['campaign_id'],
        'fees_amount' => $data['fees_amount'],
        'fees_details' => $data['fees_details']
    ]);
    return($fee);
}

public function update($campaignId)
{

    $fee = Fees::where('campaign_id', $campaignId)->first();

    $fee = DB::table('fees')
    ->where('campaign_id', $campaignId)
    ->updateOrInsert(
        ['campaign_Id' => $campaignId],
        ['fees_amount'=> request()->fees_amount,
        'fees_details'=> request()->fees_details
    ]);

    return ($fee);
}
}
