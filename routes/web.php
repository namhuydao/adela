<?php

use Illuminate\Support\Facades\Route;

//Authentication
Route::get('/admin/register', 'Backend\Auth\RegisterController@create')->name('register')->middleware('guest');
Route::post('/admin/register', 'Backend\Auth\RegisterController@store');

Route::get('/admin/resend', 'Backend\Auth\VerificationController@create')->name('resend')->middleware('guest');
Route::post('/admin/resend', 'Backend\Auth\VerificationController@resend');

Route::get('/admin/verifyEmail/{token}', 'Backend\Auth\VerificationController@verifyEmail')->name('verify');

Route::get('/admin/login', 'Backend\Auth\LoginController@create')->name('login')->middleware('guest');
Route::post('/admin/login', 'Backend\Auth\LoginController@store');
Route::post('/admin/logout', 'Backend\Auth\LoginController@destroy')->name('logout');

//Dashboard
Route::get('/admin/dashboard', 'Backend\DashboardController@index')->name('dashboard')->middleware('auth');

//PostCategory
Route::resource('/admin/post/category','Backend\Post\PostCategoryController',
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
Route::resource('/admin/product/category','Backend\Product\ProductCategoryController',
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

//User
Route::resource('/admin/user','Backend\User\UserController',
    [
        'names' => [
            'index' => 'user',
            'create' => 'user.create',
            'store' => 'user.store',
            'show' => 'user.show',
            'edit' => 'user.edit',
            'update' => 'user.update',
            'destroy' => 'user.destroy',
        ]
    ])->middleware('auth');

//UserProfile
Route::get('/admin/user/profile/{user}', 'Backend\User\UserprofileController@edit')->name('profile')->middleware('auth');
Route::post('/admin/user/profile/{user}', 'Backend\User\UserprofileController@update');

Route::get('/admin/user/profile/editPass/{user}', 'Backend\User\UserprofileController@editPassword')->name('changePassword')->middleware('auth');
Route::post('/admin/user/profile/editPass/{user}', 'Backend\User\UserprofileController@updatePassword');

//Role
Route::resource('/admin/role','Backend\Role\RoleController',
    [
        'names' => [
            'index' => 'role',
            'create' => 'role.create',
            'store' => 'role.store',
            'show' => 'role.show',
            'edit' => 'role.edit',
            'update' => 'role.update',
            'destroy' => 'role.destroy',
        ]
    ])->middleware('auth');

//permission
Route::resource('/admin/permission','Backend\Permission\PermissionController',
    [
        'names' => [
            'index' => 'permission',
            'create' => 'permission.create',
            'store' => 'permission.store',
            'show' => 'permission.show',
            'edit' => 'permission.edit',
            'update' => 'permission.update',
            'destroy' => 'permission.destroy',
        ]
    ])->middleware('auth');

//Forget Password
Route::get('/admin/forgotPassword','Backend\Auth\Password\ForgotController@create')->name('forgot');
Route::post('/admin/forgotPassword','Backend\Auth\Password\ForgotController@store');
Route::post('/admin/resendPass','Backend\Auth\Password\ForgotController@resend')->name('passResend');

Route::get('/admin/resetPassword','Backend\Auth\Password\ResetController@create')->name('reset');
Route::post('/admin/resetPassword','Backend\Auth\Password\ResetController@store');

