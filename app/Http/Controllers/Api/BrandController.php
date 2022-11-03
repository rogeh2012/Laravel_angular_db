<?php

namespace App\Http\Controllers\Api;

use App\Models\Brand;
use App\Http\Controllers\Controller;

// use App\Models\Campaign;
// use App\Models\Influencer;

use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        // $allBrands = Brand::all();
        // return BrandResource::collection($allBrands);
        return Brand::all();
    }

        public function show($brandId)
        {
            // $brand = Brand::find($brandId);
            // return new BrandResource($brand);
            return Brand::find($brandId);
        }

        public function store()
        {
            $data = request()->all();
            $brand = Brand::create([
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

            ]);

            // return ("Stored successfuly"); //what to return
            return ($brand); //what to return
        }

        public function update($brandId)
    {

        $brand = Brand::find($brandId);

        $brand->fname = request()->fname;
        $brand->lname = request()->lname;
        $brand->email = request()->email;
        $brand->phone = request()->phone;
        $brand->password = request()->password;
        $brand->hear_about_us = request()->hear_about_us;
        $brand->occupation = request()->occupation;
        $brand->instagram = request()->instagram;
        $brand->facebook = request()->facebook;
        $brand->snapchat = request()->snapchat;

        $brand->save();


        return ($brand);
    }
    public function destroy($brandId)
    {
        $brand = Brand::find($brandId);

        $brand->delete();

        return "Brand $brandId deleted successfuly";
    }
}
