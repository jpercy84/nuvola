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

Route::apiResource('/cliente', App\Http\Controllers\ClienteController::Class)->middleware('api');
Route::put("update",[App\Http\Controllers\ClienteController::Class,'update']); 
Route::delete("delete/{email}",[App\Http\Controllers\ClienteController::Class,'delete']); 
Route::post("xml",[App\Http\Controllers\ListaViajeController::Class,'store']); 
Route::get("listaviaje",[App\Http\Controllers\ListaViajeController::Class,'index']); 
Route::get("listClient",[App\Http\Controllers\ClienteController::Class,'getlistClient']); 
Route::delete("destroy/{email}",[App\Http\Controllers\ClienteController::Class,'destroy']); 