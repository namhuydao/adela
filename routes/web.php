<?php

use Illuminate\Support\Facades\Route;

//Authentication
Route::get('/admin/register', 'Backend\Auth\RegisterController@create')->name('register')->middleware('guest');
Route::post('/admin/register', 'Backend\Auth\RegisterController@store');

Route::get('/admin/login', 'Backend\Auth\LoginController@create')->name('login')->middleware('guest');
Route::post('/admin/login', 'Backend\Auth\LoginController@store');
Route::post('/admin/logout', 'Backend\Auth\LoginController@destroy')->name('logout');

//Dashboard
Route::get('/admin/dashboard', 'Backend\DashboardController@index')->name('dashboard')->middleware('auth');

//PostCategory
Route::resource('/admin/postCategory','Backend\Post\PostCategoryController',
    [
        'names' => [
            'index' => 'postCategory',
            'create' => 'postCategory.create',
            'store' => 'postCategory.store',
            'show' => 'postCategory.show',
            'edit' => 'postCategory.edit',
            'update' => 'postCategory.update',
            'destroy' => 'postCategory.destroy',
        ]
    ])->middleware('auth');

//ProductCategory
Route::resource('/admin/productCategory','Backend\Product\ProductCategoryController',
    [
        'names' => [
            'index' => 'productCategory',
            'create' => 'productCategory.create',
            'store' => 'productCategory.store',
            'show' => 'productCategory.show',
            'edit' => 'productCategory.edit',
            'update' => 'productCategory.update',
            'destroy' => 'productCategory.destroy',
        ]
    ])->middleware('auth');

//postTag
Route::resource('/admin/tag','Backend\Tag\TagController',
    [
        'names' => [
            'index' => 'tag',
            'create' => 'tag.create',
            'store' => 'tag.store',
            'show' => 'tag.show',
            'edit' => 'tag.edit',
            'update' => 'tag.update',
            'destroy' => 'tag.destroy',
        ]
    ])->middleware('auth');

//Post
Route::resource('/admin/post','Backend\Post\PostController',
    [
        'names' => [
            'index' => 'post',
            'create' => 'post.create',
            'store' => 'post.store',
            'show' => 'post.show',
            'edit' => 'post.edit',
            'update' => 'post.update',
            'destroy' => 'post.destroy',
        ]
    ])->middleware('auth');

//Product
Route::resource('/admin/product','Backend\Product\ProductController',
    [
        'names' => [
            'index' => 'product',
            'create' => 'product.create',
            'store' => 'product.store',
            'show' => 'product.show',
            'edit' => 'product.edit',
            'update' => 'product.update',
            'destroy' => 'product.destroy',
        ]
    ])->middleware('auth');
