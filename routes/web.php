<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin' , 'middleware' => 'guest'], function (){
    //Authentication
    Route::get('register', 'Backend\Auth\RegisterController@create')->name('register');
    Route::post('register', 'Backend\Auth\RegisterController@store');

    Route::get('resend', 'Backend\Auth\VerificationController@create')->name('resend');
    Route::post('resend', 'Backend\Auth\VerificationController@resend');

    Route::get('verifyEmail/{token}', 'Backend\Auth\VerificationController@verifyEmail')->name('verify');

    Route::get('login', 'Backend\Auth\LoginController@create')->name('login');
    Route::post('login', 'Backend\Auth\LoginController@store');
    Route::post('logout', 'Backend\Auth\LoginController@destroy')->name('logout')->withoutMiddleware('guest');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function (){
    //Dashboard
    Route::get('dashboard', 'Backend\DashboardController@index')->name('dashboard');
    //PostCategory
    Route::group(['prefix' => 'post', 'middleware' => 'can:postCategory_view'], function (){
        Route::get('category', 'Backend\Post\PostCategoryController@index')->name('postCategory');
        Route::get('category/create', 'Backend\Post\PostCategoryController@create')->name('postCategory.create')->middleware('can:postCategory_create');
        Route::post('category/store', 'Backend\Post\PostCategoryController@store')->name('postCategory.store');
        Route::get('category/edit/{PostCategory}', 'Backend\Post\PostCategoryController@edit')->name('postCategory.edit')->middleware('can:postCategory_edit');
        Route::post('category/update/{PostCategory}', 'Backend\Post\PostCategoryController@update')->name('postCategory.update');
        Route::post('category/delete/{PostCategory}', 'Backend\Post\PostCategoryController@destroy')->name('postCategory.destroy')->middleware('can:postCategory_delete');
    });
    //ProductCategory
    Route::group(['prefix' => 'product', 'middleware' => 'can:productCategory_view'], function (){
        Route::get('category', 'Backend\Product\ProductCategoryController@index')->name('productCategory');
        Route::get('category/create', 'Backend\Product\ProductCategoryController@create')->name('productCategory.create')->middleware('can:productCategory_create');
        Route::post('category/store', 'Backend\Product\ProductCategoryController@store')->name('productCategory.store');
        Route::get('category/edit/{ProductCategory}', 'Backend\Product\ProductCategoryController@edit')->name('productCategory.edit')->middleware('can:productCategory_edit');
        Route::post('category/update/{ProductCategory}', 'Backend\Product\ProductCategoryController@update')->name('productCategory.update');
        Route::post('category/delete/{ProductCategory}', 'Backend\Product\ProductCategoryController@destroy')->name('productCategory.destroy')->middleware('can:productCategory_delete');
    });
    //PostTag
    Route::group(['prefix' => 'tag', 'middleware' => 'can:tag_view'], function (){
        Route::get('/', 'Backend\Tag\TagController@index')->name('tag');
        Route::get('/create', 'Backend\Tag\TagController@create')->name('tag.create')->middleware('can:tag_create');
        Route::post('/store', 'Backend\Tag\TagController@store')->name('tag.store');
        Route::get('/edit/{Tag}', 'Backend\Tag\TagController@edit')->name('tag.edit')->middleware('can:tag_edit');
        Route::post('/update/{Tag}', 'Backend\Tag\TagController@update')->name('tag.update');
        Route::post('/delete/{Tag}', 'Backend\Tag\TagController@destroy')->name('tag.destroy')->middleware('can:tag_delete');
    });
    //Post
    Route::group(['prefix' => 'post', 'middleware' => 'can:post_view'], function (){
        Route::get('/', 'Backend\Post\PostController@index')->name('post');
        Route::get('/create', 'Backend\Post\PostController@create')->name('post.create')->middleware('can:post_create');
        Route::post('/store', 'Backend\Post\PostController@store')->name('post.store');
        Route::get('/edit/{Post}', 'Backend\Post\PostController@edit')->name('post.edit')->middleware('can:post_edit,Post');
        Route::post('/update/{Post}', 'Backend\Post\PostController@update')->name('post.update');
        Route::post('/delete/{Post}', 'Backend\Post\PostController@destroy')->name('post.destroy')->middleware('can:post_delete');
    });
    //Product
    Route::group(['prefix' => 'product', 'middleware' => 'can:product_view'], function (){
        Route::get('/', 'Backend\Product\ProductController@index')->name('product');
        Route::get('/create', 'Backend\Product\ProductController@create')->name('product.create')->middleware('can:product_create');
        Route::post('/store', 'Backend\Product\ProductController@store')->name('product.store');
        Route::get('/edit/{Product}', 'Backend\Product\ProductController@edit')->name('product.edit')->middleware('can:product_edit,Product');
        Route::post('/update/{Product}', 'Backend\Product\ProductController@update')->name('product.update');
        Route::post('/delete/{Product}', 'Backend\Product\ProductController@destroy')->name('product.destroy')->middleware('can:product_delete');
    });
    //User
    Route::group(['prefix' => 'user'], function (){
        Route::get('/', 'Backend\User\UserController@index')->name('user')->middleware('can:user_view');
        Route::get('/create', 'Backend\User\UserController@create')->name('user.create')->middleware('can:user_create');
        Route::post('/store', 'Backend\User\UserController@store')->name('user.store');
        Route::get('/edit/{User}', 'Backend\User\UserController@edit')->name('user.edit')->middleware('can:user_edit');
        Route::post('/update/{User}', 'Backend\User\UserController@update')->name('user.update');
        Route::post('/delete/{User}', 'Backend\User\UserController@destroy')->name('user.destroy')->middleware('can:user_delete');
        Route::group(['prefix' => 'profile'], function () {
            Route::get('{user}', 'Backend\User\UserprofileController@edit')->name('profile');
            Route::post('{user}', 'Backend\User\UserprofileController@update');
            Route::get('editPass/{user}', 'Backend\User\UserprofileController@editPassword')->name('changePassword')->middleware('auth');
            Route::post('editPass/{user}', 'Backend\User\UserprofileController@updatePassword');
        });
    });
    //Role
    Route::group(['prefix' => 'role', 'middleware' => 'can:role_view'], function (){
        Route::get('/', 'Backend\Role\RoleController@index')->name('role');
        Route::get('/create', 'Backend\Role\RoleController@create')->name('role.create')->middleware('can:role_create');;
        Route::post('/store', 'Backend\Role\RoleController@store')->name('role.store');
        Route::get('/edit/{Role}', 'Backend\Role\RoleController@edit')->name('role.edit')->middleware('can:role_edit');;
        Route::post('/update/{Role}', 'Backend\Role\RoleController@update')->name('role.update');
        Route::post('/delete/{Role}', 'Backend\Role\RoleController@destroy')->name('role.destroy')->middleware('can:role_delete');;
    });
    //Permission
    Route::group(['prefix' => 'permission', 'middleware' => 'can:permission_view'], function (){
        Route::get('/', 'Backend\Permission\PermissionController@index')->name('permission');
        Route::get('/create', 'Backend\Permission\PermissionController@create')->name('permission.create')->middleware('can:permission_create');;
        Route::post('/store', 'Backend\Permission\PermissionController@store')->name('permission.store');
        Route::get('/edit/{Permission}', 'Backend\Permission\PermissionController@edit')->name('permission.edit')->middleware('can:permission_edit');;
        Route::post('/update/{Permission}', 'Backend\Permission\PermissionController@update')->name('permission.update');
        Route::post('/delete/{Permission}', 'Backend\Permission\PermissionController@destroy')->name('permission.destroy')->middleware('can:permission_delete');;
    });
});
Route::group(['prefix' => 'admin'], function (){
    //Forget Password
    Route::get('forgotPassword','Backend\Auth\Password\ForgotController@create')->name('forgot');
    Route::post('forgotPassword','Backend\Auth\Password\ForgotController@store');
    Route::post('resendPass','Backend\Auth\Password\ForgotController@resend')->name('passResend');

    Route::get('resetPassword','Backend\Auth\Password\ResetController@create')->name('reset');
    Route::post('resetPassword','Backend\Auth\Password\ResetController@store');
});

Route::group(['prefix' => '/'], function (){
    Route::get('home','Site\HomeController@index')->name('home');
});
