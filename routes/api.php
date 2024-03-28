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

//Route::middleware('auth:api')->delete('/genres/{id}', 'GenreApiController@destory');

//To CRUD Books

Route::apiResource('/books','BookApiController');
Route::apiResource('/genres','GenreApiController');

//To get token For User
Route::post('/register', 'AuthApiController@register');
Route::post('/login', 'AuthApiController@login');

//Protected Routes
Route::group([
    "middleware" =>["auth:api"]
], function (){
    Route::get('/profile','AuthApiController@profile');
    Route::get('/logout','AuthApiController@logout');
    
}

);




