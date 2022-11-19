<?php

namespace App\Http\Controllers\Api;

use App\Models\Influencer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class InfluencerController extends Controller
{
    public function index()
    {
        return Influencer::all();
    }

        public function show($influencerId)
        {
            return Influencer::find($influencerId);
        }

        public function influencer(Request $request) {
            $influencer = $request->user();
            return  $influencer ;
        }
        public function store(Request $request)
        {
            $request->validate([
                'email' => 'unique:influencers,email',
            ]);
            $data = request()->all();
            $influencer = new Influencer();
            if(isset($data['fname'])){
                $influencer->fname=$data['fname'];
            }
            if(isset($data['lname'])){
                $influencer->lname=$data['lname'];
            }
            if(isset($data['email'])){
                $influencer->email=$data['email'];
            }
            if(isset($data['phone'])){
                $influencer->phone=$data['phone'];
            }
            if(isset($data['password'])){
                $influencer->password= Hash::make($data['password']);
            }
            if(isset($data['hear_about_us'])){
                $influencer->hear_about_us=$data['hear_about_us'];
            }
            if(isset($data['occupation'])){
                $influencer->occupation=$data['occupation'];
            }
            if(isset($data['instagram'])){
                $influencer->instagram=$data['instagram'];
            }
            if(isset($data['facebook'])){
                $influencer->facebook=$data['facebook'];
            }
            if(isset($data['snapchat'])){
                $influencer->snapchat=$data['snapchat'];
            }
            if(isset($data['age'])){
                $influencer->age=$data['age'];
            }
            if(isset($data['price'])){
                $influencer->price=$data['price'];
            }
            if(isset($data['engagement_rate'])){
                $influencer->engagement_rate=$data['engagement_rate'];
            }
            if(isset($data['followers'])){
                $influencer->followers=$data['followers'];
            }
            if(isset($data['gender'])){
                $influencer->gender=$data['gender'];
            }
            if(isset($data['children'])){
                $influencer->children=$data['children'];
            }
            if(isset($data['country'])){
                $influencer->country=$data['country'];
            }
            $influencer->save();
            $token = $influencer->createToken($request->email)->plainTextToken;
            return response()->json([
             'access_token' => $token,
            ]);
        }

        public function update($influencerId)
        {
            $influencer = Influencer::find($influencerId);

            $influencer->fname = request()->fname;
            $influencer->lname = request()->lname;
            $influencer->email = request()->email;
            $influencer->phone = request()->phone;
            $influencer->password = request()->password;
            $influencer->hear_about_us = request()->hear_about_us;
            $influencer->occupation = request()->occupation;
            $influencer->instagram = request()->instagram;
            $influencer->facebook = request()->facebook;
            $influencer->snapchat = request()->snapchat;
            $influencer->age = request()->age;
            $influencer->price = request()->price;
            $influencer->engagement_rate = request()->engagement_rate;
            $influencer->followers = request()->followers;
            $influencer->gender = request()->gender;
            $influencer->children = request()->children;
            $influencer->country = request()->country;

            $influencer->save();


            return ($influencer);
        }
    public function destroy($influencerId)
    {
        $influencer = Influencer::find($influencerId);

        $influencer->delete();

        return "influencer $influencerId deleted successfuly";
    }
}
