<?php

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

Route::get('/contacts', "App\Http\Controllers\Contacts@index");
Route::get('/contacts/show/{id}', "App\Http\Controllers\Contacts@show");
Route::post('/contacts/store', "App\Http\Controllers\Contacts@store");
Route::put('/contacts/update/', "App\Http\Controllers\Contacts@update");
Route::delete('/contacts/delete/{id}', "App\Http\Controllers\Contacts@destroy");