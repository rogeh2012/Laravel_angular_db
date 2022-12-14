<?php

use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\InfluencerController;
use App\Http\Controllers\Api\CampaignController;
use App\Http\Controllers\Api\InstagramController;
use App\Http\Controllers\Api\TikTokController;
use App\Http\Controllers\Api\BrandInformationController;
use App\Http\Controllers\Api\FeesController;
use App\Http\Controllers\Api\PaymentController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Brand;
use App\Models\Campaign;
use App\Models\Influencer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('brands', [BrandController::class, 'index'])->middleware('auth:sanctum');
Route::get('/brand', [BrandController::class, 'brand'])->middleware('auth:sanctum');
Route::get('brands/{brand}', [BrandController::class, 'show'])->middleware('auth:sanctum');
Route::post('brands', [BrandController::class, 'store']);
Route::put('/brands/{brand}', [BrandController::class, 'update']);
Route::delete('/brands/{brand}', [BrandController::class, 'destroy']);

Route::post('brands/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $brand = Brand::where('email', $request->email)->first();
    if (! $brand ) {
        throw ValidationException::withMessages([
            'email' => ['The provided email is incorrect.'],
        ]);
    }else if(! Hash::check($request->password, $brand->password)){
        throw ValidationException::withMessages([
            'password' => ['The provided password is incorrect.'],
        ]);
    }

    $token = $brand->createToken($request->email)->plainTextToken;
    return response()->json([
        'access_token' => $token,
        'isAdmin' => $brand['isAdmin'],
    ]);
});

Route::get('influencers', [InfluencerController::class, 'index']);
Route::get('/influencer', [InfluencerController::class, 'influencer'])->middleware('auth:sanctum');
Route::get('influencers/{influencer}', [InfluencerController::class, 'show']);
Route::post('influencers', [InfluencerController::class, 'store']);
Route::put('/influencers/{influencer}', [InfluencerController::class, 'update']);
Route::delete('/influencers/{influencer}', [InfluencerController::class, 'destroy']);

Route::post('influencers/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $influencer = Influencer::where('email', $request->email)->first();
    if (! $influencer ) {
        throw ValidationException::withMessages([
            'email' => ['The provided email is incorrect.'],
        ]);
    }else if(! Hash::check($request->password, $influencer->password)){
        throw ValidationException::withMessages([
            'password' => ['The provided password is incorrect.'],
        ]);
    }

   $token = $influencer->createToken($request->email)->plainTextToken;
   return response()->json([
    'access_token' => $token,

   ]);
});


Route::get('campaigns', [CampaignController::class, 'index']);
Route::get('/campaign', [CampaignController::class, 'campaign'])->middleware('auth:sanctum');

Route::get('campaigns/{campaign}', [CampaignController::class, 'show']);
Route::post('campaigns', [CampaignController::class, 'store']);
Route::put('/campaigns/{campaign}', [CampaignController::class, 'update']);
Route::delete('/campaigns/{campaign}', [CampaignController::class, 'destroy']);


Route::post('campaigns/instagram/{campaign}', [InstagramController::class, 'store']);
Route::post('campaigns/tiktok/{campaign}', [TikTokController::class, 'store']);
Route::post('campaigns/fees/{campaign}', [FeesController::class, 'store']);

Route::put('campaigns/instagram/{campaign}', [InstagramController::class, 'update']);
Route::put('campaigns/tiktok/{campaign}', [TikTokController::class, 'update']);
Route::put('campaigns/fees/{campaign}', [FeesController::class, 'update']);
Route::put('campaigns/status/{campaign}', [CampaignController::class, 'updateStatus']);

Route::get('pending', [CampaignController::class, 'getpending'])->middleware('auth:sanctum');
Route::get('completed', [CampaignController::class, 'getcompleted'])->middleware('auth:sanctum');
Route::get('drafts', [CampaignController::class, 'getdrafts'])->middleware('auth:sanctum');

Route::get('brandinfo',[BrandInformationController::class,'index']);
Route::get('brandinfo/{brandinfo}',[BrandInformationController::class,'show']);
Route::put('brandinfo/{brandinfo}',[BrandInformationController::class,'update']);

Route::get('latest/{date}',[CampaignController::class,'latest']);

Route::get('last-used-at',[BrandController::class,'getLastUsedAt'])->middleware('auth:sanctum');



Route::get('payments', [PaymentController::class, 'index']);
// Route::get('payments/{payment}', [PaymentController::class, 'show']);
// Route::post('payments', [PaymentController::class, 'store']);
// Route::put('/payments/{payment}', [PaymentController::class,'update']);
// Route::delete('/payments/{payment}', [PaymentController::class,'destroy']);

