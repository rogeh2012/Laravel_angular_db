<?php

namespace App\Http\Controllers\Api;
use App\Models\Campaign;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index()
    {

        return Campaign::all();
    }

        public function show($campaignId)
        {

            return Campaign::find($campaignId);
        }

        public function store()
        {
            $data = request()->all();
            $campaign = Campaign::create([
                'title' => $data['title'],
                'type' => $data['type'],
                'country' => $data['country'],
                'details' => $data['details'],


            ]);

            // return ("Stored successfuly"); //what to return
            return ($campaign); //what to return
        }

        public function update($campaignId)
    {

        $campaign = Campaign::find($campaignId);

        $campaign->title = request()->title;
        $campaign->type = request()->type;
        $campaign->country = request()->country;
        $campaign->details = request()->details;


        $campaign->save();


        return ($campaign);
    }
    public function destroy($campaignId)
    {
        $campaign = Campaign::find($campaignId);

        $campaign->delete();

        return "Campaign $campaignId deleted successfuly";
    }
}
