<?php

namespace App\Http\Controllers\Api;

use App\Models\Campaign;
use App\Http\Controllers\Controller;
use App\Http\Resources\CampaignResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CampaignController extends Controller
{
    public function index()
    {
        // $campaigns = Campaign::all();
        $campaigns = Campaign::where('pending',0)->where('drafts',0)->where('completed',0)->get();
        return CampaignResource::collection($campaigns);
    }

    public function campaign(Request $request) {
        $brandId = $request->user()->id;
        $campaigns = Campaign::where('pending',0)->where('drafts',0)->where('completed',0)->where('brand_id', $brandId)->get();
        return CampaignResource::collection($campaigns) ;
    }

    public function show($campaignId)
    {
        $campaign = Campaign::find($campaignId);
        return new CampaignResource($campaign);
    }


        public function store()
        {
            $data = request()->all();
            $campaign = Campaign::create([
                'title' => $data['title'],
                'brand_id' => $data['brand_id'],
                'type' => $data['type'],
                'privacy' => $data['privacy'],
                'country' => $data['country'],
                'details' => $data['details'],
                'start_date' => $data['start_date'],
                'instagram' => $data['instagram'],
                'tiktok' => $data['tiktok'],
                'pending' => $data['pending'],
                'completed' => $data['completed'],
                'drafts' => $data['drafts'],
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
        $campaign->tiktok = request()->tiktok;
        $campaign->pending = request()->pending;
        // $campaign->image = request()->image;

        $campaign->save();
        return ($campaign);
    }

    public function updateStatus($campaignId)
    {

        $campaign = Campaign::find($campaignId);

        $campaign->pending = request()->pending;
        $campaign->completed = request()->completed;
        $campaign->drafts = request()->drafts;

        $campaign->save();
        return ($campaign);
    }

    public function destroy($campaignId)
    {
        $campaign = Campaign::find($campaignId);

        $campaign->delete();

        return "";
    }

    public function getpending(Request $request)
    {
        $brandId = $request->user()->id;
        $campaigns = Campaign::where('brand_id',$brandId)->where('pending', 1)->get();
        return CampaignResource::collection($campaigns);
    }

    public function getcompleted(Request $request)
    {
        $brandId = $request->user()->id;
        $campaigns = Campaign::where('brand_id',$brandId)->where('completed', 1)->get();
        return CampaignResource::collection($campaigns);

    }

    public function getdrafts(Request $request)
    {
        $brandId = $request->user()->id;
        $campaigns = Campaign::where('brand_id',$brandId)->where('drafts', 1)->get();
        return CampaignResource::collection($campaigns);
    }
}
