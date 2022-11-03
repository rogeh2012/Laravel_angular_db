<?php

namespace App\Http\Controllers\Api;

use App\Models\Influencer;
use App\Http\Controllers\Controller;

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

        public function store()
        {
            $data = request()->all();
            $influencer = Influencer::create([
                'fname' => $data['fname'],
                'lname' => $data['lname'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'password' => $data['password'],
                'hear_about_us' => $data['hear_about_us'],
                'occupation' => $data['occupation'],
                'instagram' => $data['instagram'],
                'facebook' => $data['facebook'],
                'snapchat' => $data['snapchat'],
                'age' => $data['age'],
                'price' => $data['price'],
                'engagement_rate' => $data['engaengagement_ratege'],
                'followers' => $data['followers'],
                'gender' => $data['gender'],
                'children' => $data['children'],
                'country' => $data['country'],

            ]);

            // return ("Stored successfuly"); //what to return
            return ($influencer); //what to return
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
