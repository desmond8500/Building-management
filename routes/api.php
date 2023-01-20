<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::resource('clients', App\Http\Controllers\API\ClientAPIController::class);


Route::resource('compteurs', App\Http\Controllers\API\compteurAPIController::class);


Route::resource('appartements', App\Http\Controllers\API\appartementAPIController::class);


Route::resource('factures', App\Http\Controllers\API\FactureAPIController::class);


Route::resource('contrats', App\Http\Controllers\API\ContratAPIController::class);
