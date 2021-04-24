<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin' , 'middleware' => 'guest'], function (){
    //Authentication
    Route::get('register', 'Backend\Auth\RegisterController@create')->name('register');
    Route::post('register', 'Backend\Auth\RegisterController@store');

    Route::get('verify', 'Backend\Auth\VerificationController@create')->name('resend');
    Route::post('verify', 'Backend\Auth\VerificationController@resend');
    Route::get('verify_again', 'Backend\Auth\VerificationController@verify_again')->name('verify_again');

    Route::get('verifyEmail/{token}', 'Backend\Auth\VerificationController@verifyEmail')->name('verify');

    Route::get('login', 'Backend\Auth\LoginController@create')->name('login');
    Route::post('login', 'Backend\Auth\LoginController@store');
    Route::post('logout', 'Backend\Auth\LoginController@destroy')->name('logout')->withoutMiddleware('guest');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function (){
    //Dashboard
    Route::get('', 'Backend\DashboardController@index')->name('dashboard');
    //Menu
    Route::group(['prefix' => 'menu'], function (){
        Route::get('/', 'Backend\MenuController@index')->name('menu')->middleware('can:menu_view');
        Route::get('/create', 'Backend\MenuController@create')->name('menu.create')->middleware('can:menu_create');
        Route::post('/store', 'Backend\MenuController@store')->name('menu.store');
        Route::get('/edit/{Menu}', 'Backend\MenuController@edit')->name('menu.edit')->middleware('can:menu_edit');
        Route::post('/update/{Menu}', 'Backend\MenuController@update')->name('menu.update');
        Route::post('/delete/{Menu}', 'Backend\MenuController@destroy')->name('menu.destroy')->middleware('can:menu_delete');
    });

    //Banner
    Route::group(['prefix' => 'banner'], function (){
        Route::get('/', 'Backend\Banner\BannerController@index')->name('banner')->middleware('can:banner_view');
        Route::get('/create', 'Backend\Banner\BannerController@create')->name('banner.create')->middleware('can:banner_create');
        Route::post('/store', 'Backend\Banner\BannerController@store')->name('banner.store');
        Route::get('/edit/{Banner}', 'Backend\Banner\BannerController@edit')->name('banner.edit')->middleware('can:banner_edit');
        Route::post('/update/{Banner}', 'Backend\Banner\BannerController@update')->name('banner.update');
        Route::post('/delete/{Banner}', 'Backend\Banner\BannerController@destroy')->name('banner.destroy')->middleware('can:banner_delete');
    });

    //Tag
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
        Route::get('/', 'Backend\Post\PostController@index')->name('post')->middleware('can:post_view');
        Route::get('/create', 'Backend\Post\PostController@create')->name('post.create')->middleware('can:post_create');
        Route::post('/store', 'Backend\Post\PostController@store')->name('post.store');
        Route::get('/edit/{Post}', 'Backend\Post\PostController@edit')->name('post.edit')->middleware('can:post_edit,Post');
        Route::post('/update/{Post}', 'Backend\Post\PostController@update')->name('post.update');
        Route::post('/delete/{Post}', 'Backend\Post\PostController@destroy')->name('post.destroy')->middleware('can:post_delete,Post');

        Route::get('category', 'Backend\Post\PostCategoryController@index')->name('postCategory')->middleware('can:postCategory_view');
        Route::get('category/create', 'Backend\Post\PostCategoryController@create')->name('postCategory.create')->middleware('can:postCategory_create');
        Route::post('category/store', 'Backend\Post\PostCategoryController@store')->name('postCategory.store');
        Route::get('category/edit/{PostCategory}', 'Backend\Post\PostCategoryController@edit')->name('postCategory.edit')->middleware('can:postCategory_edit');
        Route::post('category/update/{PostCategory}', 'Backend\Post\PostCategoryController@update')->name('postCategory.update');
        Route::post('category/delete/{PostCategory}', 'Backend\Post\PostCategoryController@destroy')->name('postCategory.destroy')->middleware('can:postCategory_delete');
    });
    //Product
    Route::group(['prefix' => 'product'], function (){
        Route::get('/', 'Backend\Product\ProductController@index')->name('product')->middleware('can:product_view');
        Route::get('/create', 'Backend\Product\ProductController@create')->name('product.create')->middleware('can:product_create');
        Route::post('/store', 'Backend\Product\ProductController@store')->name('product.store');
        Route::get('/edit/{Product}', 'Backend\Product\ProductController@edit')->name('product.edit')->middleware('can:product_edit,Product');
        Route::post('/update/{Product}', 'Backend\Product\ProductController@update')->name('product.update');
        Route::post('/delete/{Product}', 'Backend\Product\ProductController@destroy')->name('product.destroy')->middleware('can:product_delete,Product');

        Route::get('category', 'Backend\Product\ProductCategoryController@index')->name('productCategory')->middleware('can:productCategory_view');
        Route::get('category/create', 'Backend\Product\ProductCategoryController@create')->name('productCategory.create')->middleware('can:productCategory_create');
        Route::post('category/store', 'Backend\Product\ProductCategoryController@store')->name('productCategory.store');
        Route::get('category/edit/{ProductCategory}', 'Backend\Product\ProductCategoryController@edit')->name('productCategory.edit')->middleware('can:productCategory_edit');
        Route::post('category/update/{ProductCategory}', 'Backend\Product\ProductCategoryController@update')->name('productCategory.update');
        Route::post('category/delete/{ProductCategory}', 'Backend\Product\ProductCategoryController@destroy')->name('productCategory.destroy')->middleware('can:productCategory_delete');

        Route::get('brand', 'Backend\Product\BrandController@index')->name('brand')->middleware('can:brand_view');
        Route::get('brand/create', 'Backend\Product\BrandController@create')->name('brand.create')->middleware('can:brand_create');
        Route::post('brand/store', 'Backend\Product\BrandController@store')->name('brand.store');
        Route::get('brand/edit/{Brand}', 'Backend\Product\BrandController@edit')->name('brand.edit')->middleware('can:brand_edit');
        Route::post('brand/update/{Brand}', 'Backend\Product\BrandController@update')->name('brand.update');
        Route::post('brand/delete/{Brand}', 'Backend\Product\BrandController@destroy')->name('brand.destroy')->middleware('can:brand_delete');

        Route::get('size', 'Backend\Product\SizeController@index')->name('size')->middleware('can:size_view');
        Route::get('size/create', 'Backend\Product\SizeController@create')->name('size.create')->middleware('can:size_create');
        Route::post('size/store', 'Backend\Product\SizeController@store')->name('size.store');
        Route::get('size/edit/{Size}', 'Backend\Product\SizeController@edit')->name('size.edit')->middleware('can:size_edit');
        Route::post('size/update/{Size}', 'Backend\Product\SizeController@update')->name('size.update');
        Route::post('size/delete/{Size}', 'Backend\Product\SizeController@destroy')->name('size.destroy')->middleware('can:size_delete');

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
    Route::group(['prefix' => 'role'], function (){
        Route::get('/', 'Backend\Role\RoleController@index')->name('role')->middleware('can:role_view');
        Route::get('/create', 'Backend\Role\RoleController@create')->name('role.create')->middleware('can:role_create');
        Route::post('/store', 'Backend\Role\RoleController@store')->name('role.store');
        Route::get('/edit/{Role}', 'Backend\Role\RoleController@edit')->name('role.edit')->middleware('can:role_edit');
        Route::post('/update/{Role}', 'Backend\Role\RoleController@update')->name('role.update');
        Route::post('/delete/{Role}', 'Backend\Role\RoleController@destroy')->name('role.destroy')->middleware('can:role_delete');
    });
    //Permission
    Route::group(['prefix' => 'permission'], function (){
        Route::get('/', 'Backend\Permission\PermissionController@index')->name('permission')->middleware('can:permission_view');
        Route::get('/create', 'Backend\Permission\PermissionController@create')->name('permission.create')->middleware('can:permission_create');
        Route::post('/store', 'Backend\Permission\PermissionController@store')->name('permission.store');
        Route::get('/edit/{Permission}', 'Backend\Permission\PermissionController@edit')->name('permission.edit')->middleware('can:permission_edit');
        Route::post('/update/{Permission}', 'Backend\Permission\PermissionController@update')->name('permission.update');
        Route::post('/delete/{Permission}', 'Backend\Permission\PermissionController@destroy')->name('permission.destroy')->middleware('can:permission_delete');
    });

    //Setting
    Route::group(['prefix' => 'setting'], function (){
        Route::get('/', 'Backend\SettingController@index')->name('setting')->middleware('can:setting_view');
        Route::get('/create', 'Backend\SettingController@create')->name('setting.create')->middleware('can:setting_create');
        Route::post('/store', 'Backend\SettingController@store')->name('setting.store');
        Route::get('/edit/{Setting}', 'Backend\SettingController@edit')->name('setting.edit')->middleware('can:setting_edit');
        Route::post('/update/{Setting}', 'Backend\SettingController@update')->name('setting.update');
        Route::post('/delete/{Setting}', 'Backend\SettingController@destroy')->name('setting.destroy')->middleware('can:setting_delete');
    });

    //Bill
    Route::group(['prefix' => 'bill'], function (){
        Route::get('/', 'Backend\BillController@index')->name('bill')->middleware('can:bill_view');
        Route::get('/create', 'Backend\BillController@create')->name('bill.create')->middleware('can:bill_create');
        Route::post('/store', 'Backend\BillController@store')->name('bill.store');
        Route::get('/edit/{Bill}', 'Backend\BillController@edit')->name('bill.edit')->middleware('can:bill_edit');
        Route::post('/update/{Bill}', 'Backend\BillController@update')->name('bill.update');
        Route::post('/delete/{Bill}', 'Backend\BillController@destroy')->name('bill.destroy')->middleware('can:bill_delete');
    });

    //Bill
    Route::group(['prefix' => 'billItem'], function (){
        Route::get('/edit/{BillItem}', 'Backend\BillItemController@edit')->name('billItem.edit');
        Route::post('/update/{BillItem}', 'Backend\BillItemController@update')->name('billItem.update');
        Route::get('/delete/{BillItem}', 'Backend\BillItemController@destroy')->name('billItem.destroy')->middleware('can:bill_delete');
    });

    Route::get('invoice/{Bill}','Backend\BillController@invoice')->name('invoice');
});
Route::group(['prefix' => 'admin'], function (){
    //Forget Password
    Route::get('forgotPassword','Backend\Auth\Password\ForgotController@create')->name('forgot');
    Route::post('forgotPassword','Backend\Auth\Password\ForgotController@store');

    Route::get('email_again','Backend\Auth\Password\ForgotController@email_again')->name('email_again');

    Route::post('resendPass','Backend\Auth\Password\ForgotController@resend')->name('passResend');

    Route::get('resetPassword','Backend\Auth\Password\ResetController@create')->name('reset');
    Route::post('resetPassword','Backend\Auth\Password\ResetController@store');
});

Route::group(['prefix' => '/'], function (){

    Route::get('','Site\HomeController@index')->name('home');
    Route::post('newsletter','Site\HomeController@newsletter')->name('newsletter');
    Route::get('tin-tuc','Site\BlogController@index')->name('blog');
    Route::get('tin-tuc/{id}','Site\BlogController@show')->name('blogDetails');
    Route::get('lien-he','Site\ContactController@index')->name('contact');
    Route::get('cart','Site\CartController@cart')->name('cart');
    Route::get('shop/details/{Product}','Site\ShopController@show')->name('shopDetails');
    Route::get('shop/addCart/{id}','Site\ShopController@addCart')->name('addCart');
    Route::get('cart/{id}','Site\CartController@deleteItem')->name('cartDelete');
    Route::get('cartUpdate/{id}','Site\CartController@updateItem')->name('cartUpdate');
    Route::get('checkout','Site\CheckoutController@index')->name('checkout');
    Route::post('checkout','Site\CheckoutController@checkout');
    Route::get('checkoutSuccess','Site\CheckoutController@success')->name('checkout-success');

    Route::get('/ajax/view-product', 'Site\ShopController@ajaxViewProduct')->name('productPopup');

    Route::get('{slug}','Site\ShopController@list')->name('shop.list');

});
