<?php

use App\Http\Controllers\PlaceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/docs-api', function () {
    return redirect('https://documenter.getpostman.com/view/16120522/2s93z6cPKW#intro');
});

Route::get('get-place/{id}', [PlaceController::class, 'getPlaceById']);
