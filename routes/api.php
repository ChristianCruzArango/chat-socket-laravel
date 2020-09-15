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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('auth/register','Api\AuthController@register' )->name('api.auth.register');
Route::post('auth/login','Api\AuthController@login' )->name('api.auth.login');
Route::get('auth/me','Api\AuthController@me' )->name('api.auth.me')->middleware('auth:api');
Route::post('mensaje/send','Api\MensajeController@send' )->name('api.auth.send')->middleware('auth:api');
Route::post('supervisor/coordenadas','Supervisores\CoordenadasController@sendCoordenadas' )->name('api.auth.coordenadas')->middleware('auth:api');
Route::post('mensaje/sendUsuario','Api\MensajeController@sendUsuario' )->name('api.auth.sendUsuario')->middleware('auth:api');
