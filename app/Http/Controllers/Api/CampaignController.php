<?php

namespace App\Http\Controllers\Api;
use App\Models\Campaign;
use App\Http\Controllers\Controller;
use App\Http\Resources\CampaignResource;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::all();
        return CampaignResource::collection($campaigns);
    }

        public function show($campaignId)
        {
            $campaign= Campaign::find($campaignId);
            return new CampaignResource($campaign);

        }

        public function store()
        {
            $data = request()->all();
            $campaign = Campaign::create([
                'title' => $data['title'],
                'type' => $data['type'],
                'country' => $data['country'],
                'details' => $data['details'],
                'start_date' => $data['start_date'],
                'instagram' => $data['instagram'],
                'tiktok' => $data['tiktok'],
                // 'pending' => $data['pending'],
                // 'completed' => $data['completed'],
                // 'drafts' => $data['drafts'],
                // 'image' => $data['image'],
            ]);

            return ($campaign); //what to return
        }

        public function update($campaignId)
    {

        $campaign = Campaign::find($campaignId);

        $campaign->title = request()->title;
        $campaign->type = request()->type;
        $campaign->country = request()->country;
        $campaign->details = request()->details;
        $campaign->start_date = request()->start_date;
        $campaign->instagram = request()->instagram;
        // $campaign->pending = request()->pending;
        // $campaign->completed = request()->completed;
        // $campaign->drafts = request()->drafts;
        // $campaign->image = request()->image;

        $campaign->save();

        // return new CampaignResource($campaign);
        return ($campaign);
    }

    public function destroy($campaignId)
    {
        $campaign = Campaign::find($campaignId);

        $campaign->delete();

        return "";
    }

        public function getpending(){

            $pendingcampaigns= Campaign::where('pending', 1);
            return $pendingcampaigns;
        }

        public function getcompleted(){
            $completedcampaigns= Campaign::where('completed', 1);
            return $completedcampaigns;
        }

        public function getdrafts(){
            $drafts= Campaign::where('drafts', 1);
            return $drafts;
        }

}
