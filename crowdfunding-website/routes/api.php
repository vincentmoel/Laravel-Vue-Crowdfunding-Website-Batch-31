<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OtpCodeController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\SocialiteController;

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

Route::post('/register',[UserController::class,'store']);
Route::post('/login',[AuthController::class,'login']);
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth:api');
Route::post('/check-token',[AuthController::class,'checkToken'])->middleware('auth:api');

Route::post('/regenerate-otp',[OtpCodeController::class,'update']);
Route::post('/verification-otp',[OtpCodeController::class,'verification']);

Route::post('/update-password',[UserController::class,'updatePassword']);

Route::get('/social/{provider}',[SocialiteController::class,'redirectToProvider']);
Route::get('/social/{provider}/callback',[SocialiteController::class,'handleProviderCallback']);


Route::group(['middleware' => 'api', 'prefix' => 'campaign'], function(){

    Route::get('random/{count}', [CampaignController::class,'random']);
    Route::get('store', [CampaignController::class,'store']);
    Route::get('/', [CampaignController::class,'index']);
    Route::get('/{id}',[CampaignController::class,'show']);
    Route::get('/search/{keyword}',[CampaignController::class,'search']);
});


Route::group(['middleware' => 'api', 'prefix' => 'blog'], function(){

    Route::get('random/{count}', [BlogController::class,'random']);
    Route::get('store', [BlogController::class,'store']);
});