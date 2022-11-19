<?php
namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Hash;
use App\Models\Brand;
use App\Models\BrandInformation;
use App\Http\Controllers\Controller;
use App\Http\Resources\BrandResource;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class BrandInformationController extends Controller
{

    public function update($brandId)
{
    // $BrandInfo = BrandInformation::where('brand_id', $brandId)->first();
    $BrandInfo = DB::table('brand_information')
    ->where('brand_id', $brandId)
    ->updateOrInsert(
        ['brand_id' => $brandId],
        ['about'=> request()->about,
        'industries'=> request()->industries,
        'location'=> request()->location,
        'facebook' => request()-> facebook,
        'tiktok'=> request()->tiktok,
        'youtube'=> request()->youtube,
        ]);

    return ($BrandInfo);
}
}
