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
        $campaign = Campaign::find($campaignId);
        return new CampaignResource($campaign);
    }


        public function store(Request $request)
        {
            $campaign = new Campaign;
            $campaign -> title = $request->input('title');
            $campaign -> type = $request->input('type');
            $campaign -> country = $request->input('country');
            $campaign -> details = $request->input('details');
            // $campaign -> start_date = $request->input('start_date');
            $campaign -> instagram = $request->input('instagram');
            $campaign -> tiktok = $request->input('tiktok');
            if($request->hasFile('image')){
                $file = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $extention; 
                $file->move('campaignsImage',$fileName);
                $campaign -> image = $fileName;
            }
            $campaign->save();
            return $campaign;
            // $campaign -> image = ;
            // $campaign = Campaign::create([
            //     'title' => $data['title'],
            //     'type' => $data['type'],
            //     'country' => $data['country'],
            //     'details' => $data['details'],
            //     'start_date' => $data['start_date'],
            //     'instagram' => $data['instagram'],
            //     'tiktok' => $data['tiktok'],

            //     // 'pending' => $data['pending'],
            //     // 'completed' => $data['completed'],
            //     // 'drafts' => $data['drafts'],
            //     // 'image' => $data['image'],
            // ]);

            // return ($campaign); //what to return
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
        return ($campaign);
    }

    public function destroy($campaignId)
    {
        $campaign = Campaign::find($campaignId);

        $campaign->delete();

        return "";
    }

    public function getpending()
    {
        $campaigns = Campaign::where('pending', 1)->get();
        return CampaignResource::collection($campaigns);
    }

    public function getcompleted()
    {
        $campaigns = Campaign::where('completed', 1)->get();
        return CampaignResource::collection($campaigns);

    }

    public function getdrafts()
    {
        $campaigns = Campaign::where('drafts', 1)->get();
        return CampaignResource::collection($campaigns);
    }
}
