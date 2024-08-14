<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\LikeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PreferenceController;
use App\Http\Controllers\ProfileController;

use App\Http\Middleware\IsAuthenticated;

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

    Route::post('/register',[UserController::class,'create']);
    Route::post('/login',[LoginController::class,'login']);

Route::post('/LikeUser',[LikeController::class,'LikeUser'])->middleware('authenticate');

Route::post('/preference',[PreferenceController::class,'create']);
Route::get('/preference/{id}',[PreferenceController::class,'read']);
Route::post('preferenceUpd/{id}',[PreferenceController::class,'update']);
Route::post('preferenceDel/{id}',[PreferenceController::class,'delete']);

Route::post('/profile',[ProfileController::class,'create']);
Route::post('/profilesGet',[ProfileController::class, 'getPreferredProfiles'])->middleware('authenticate');
Route::get('/profile/{id}',[ProfileController::class,'read']);
Route::post('profileUpd/{id}',[ProfileController::class,'update']);
Route::post('profileDel/{id}',[ProfileController::class,'delete']);
Route::get('getImage',[ImageController::class,'getImage'])->middleware('authenticate');

// Route::post('/Loginn',[LoginController::class,'log']);

