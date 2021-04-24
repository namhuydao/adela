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
| is assigned the "Api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'products', ['middleware' => 'auth:api']], function () {
    Route::get('', [\App\Http\Controllers\Api\AuthController::class, 'login']);
    Route::post('add', [\App\Http\Controllers\Api\AuthController::class, 'signup']);

});


Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
    Route::post('signup', [\App\Http\Controllers\Api\AuthController::class, 'signup']);

    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::delete('logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);
        Route::get('me', [\App\Http\Controllers\Api\AuthController::class, 'user']);
    });
});


Route::group(['prefix' => 'v1', 'namespace' => 'Api'], function () {

    Route::group(['prefix' => 'products'], function () {
        Route::get('', 'ProductController@index');
        Route::post('add', 'ProductController@store');
        Route::post('edit/{id}', 'ProductController@edit');
        Route::get('{id}', 'ProductController@detail');
        Route::get('delete/{id}', 'ProductController@delete');
    });


    Route::group(['prefix' => 'cart'], function () {
        Route::get('add', 'CartController@store');
    });

    //  cateogry
//    Route::group(['prefix' => 'categories'], function () {
//        Route::get('', 'CategoryController@index');
//    });
});
