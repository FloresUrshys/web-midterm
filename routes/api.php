<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PassengerStatController;
use App\Http\Controllers\API\PassengerStatPostController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login',[PassengerStatController::class,'login']);
Route::post('register',[PassengerStatController::class,'register']);
Route::post('reset-password',[PassengerStatController::class,'resetPassword']);



Route::get('get-all-posts',[PassengerStatPostController::class,'getAllPosts']);
Route::get('get-post',[PassengerStatPostController::class,'getPost']);
Route::get('search-post',[PassengerStatPostController::class,'searchPost']);
