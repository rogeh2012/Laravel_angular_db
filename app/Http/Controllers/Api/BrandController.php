<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Hash;
use App\Models\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

// use App\Models\Campaign;
// use App\Models\Influencer;


class BrandController extends Controller
{
    public function index()
    {
        // $allBrands = Brand::all();
        // return BrandResource::collection($allBrands);
        return Brand::all();
    }
    public function brand(Request $request) {
        return $request->user();
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
            $brand = new Brand();
          
            if(isset($data['fname'])){
                $brand->fname=$data['fname'];
            }
            if(isset($data['lname'])){
                $brand->lname=$data['lname'];
            }
            if(isset($data['email'])){
                $brand->email=$data['email'];
            }
            if(isset($data['phone'])){
                $brand->phone=$data['phone'];
            }
            if(isset($data['password'])){
                $brand->password=Hash::make($data['password']);
            }
            if(isset($data['hear_about_us'])){
                $brand->hear_about_us=$data['hear_about_us'];
            }
            if(isset($data['brand_name'])){
                $brand->brand_name=$data['brand_name'];
            }
            if(isset($data['instagram'])){
                $brand->instagram=$data['instagram'];
            }
            if(isset($data['job_title'])){
                $brand->job_title=$data['job_title'];
            }
            if(isset($data['snapchat'])){
                $brand->snapchat=$data['snapchat'];
            }
           
            $brand->save();
            return ($brand);
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
