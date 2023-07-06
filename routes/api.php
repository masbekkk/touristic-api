<?php

use App\Http\Controllers\InterestController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\PlaceInterestController;
use App\Http\Controllers\ReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('place', PlaceController::class);
Route::resource('interest', InterestController::class);
Route::resource('place-interest', PlaceInterestController::class);
Route::resource('review', ReviewController::class);
Route::get('get-place/{id}', [PlaceController::class, 'getPlaceById']);


Route::match(['get', 'post'], 'get-place-by-interest', [PlaceInterestController::class, 'getPlacesByInterest']);
// Route::get('get-place-by-interest', [PlaceInterestController::class, 'getPlacesByInterest']);
