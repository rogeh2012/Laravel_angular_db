<?php

use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\InfluencerController;
use App\Http\Controllers\Api\CampaignController;
use App\Http\Controllers\Api\InstagramController;
use App\Http\Controllers\Api\TikTokController;
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


Route::get('brands', [BrandController::class, 'index']);
Route::get('brands/{brand}', [BrandController::class, 'show']);
Route::post('brands', [BrandController::class, 'store']);
Route::put('/brands/{brand}', [BrandController::class,'update']);
Route::delete('/brands/{brand}', [BrandController::class,'destroy']);



Route::get('influencers', [InfluencerController::class, 'index']);
Route::get('influencers/{influencer}', [InfluencerController::class, 'show']);
Route::post('influencers', [InfluencerController::class, 'store']);
Route::put('/influencers/{influencer}', [InfluencerController::class,'update']);
Route::delete('/influencers/{influencer}', [InfluencerController::class,'destroy']);



Route::get('campaigns', [CampaignController::class, 'index']);
Route::get('campaigns/{campaign}', [CampaignController::class, 'show']);
Route::post('campaigns', [CampaignController::class, 'store']);
Route::put('/campaigns/{campaign}', [CampaignController::class,'update']);
Route::delete('/campaigns/{campaign}', [CampaignController::class,'destroy']);


Route::post('campaigns/instagram/{campaign}', [InstagramController::class, 'store']);

Route::post('campaigns/tiktok/{campaign}', [TikTokController::class, 'store']);
