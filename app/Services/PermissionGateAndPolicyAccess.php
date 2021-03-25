<?php
namespace App\Services;

use Illuminate\Support\Facades\Gate;

class PermissionGateAndPolicyAccess {

    public function setGateAndPolicyAccess(){
        $this->defineGatePost();
        $this->defineGatePostCategory();
        $this->defineGateProduct();
        $this->defineGateProductCategory();
        $this->defineGateTag();
        $this->defineGateUser();
        $this->defineGateRole();
        $this->defineGatePermission();
    }

    public function defineGatePost(){
        Gate::define('post_view', 'App\Policies\PostPolicy@view');
        Gate::define('post_create', 'App\Policies\PostPolicy@create');
        Gate::define('post_edit', 'App\Policies\PostPolicy@update');
        Gate::define('post_delete', 'App\Policies\PostPolicy@delete');
    }

    public function defineGatePostCategory()
    {
        Gate::define('postCategory_view', 'App\Policies\PostCategoryPolicy@view');
        Gate::define('postCategory_create', 'App\Policies\PostCategoryPolicy@create');
        Gate::define('postCategory_edit', 'App\Policies\PostCategoryPolicy@update');
        Gate::define('postCategory_delete', 'App\Policies\PostCategoryPolicy@delete');
    }

    public function defineGateProduct(){
        Gate::define('product_view', 'App\Policies\ProductPolicy@view');
        Gate::define('product_create' , 'App\Policies\ProductPolicy@create');
        Gate::define('product_edit' , 'App\Policies\ProductPolicy@update');
        Gate::define('product_delete' , 'App\Policies\ProductPolicy@delete');
    }
    public function defineGateProductCategory(){
        Gate::define('productCategory_view', 'App\Policies\ProductCategoryPolicy@view');
        Gate::define('productCategory_create' , 'App\Policies\ProductCategoryPolicy@create');
        Gate::define('productCategory_edit' , 'App\Policies\ProductCategoryPolicy@update');
        Gate::define('productCategory_delete' , 'App\Policies\ProductCategoryPolicy@delete');
    }

    public function defineGateTag(){
        Gate::define('tag_view', 'App\Policies\TagPolicy@view');
        Gate::define('tag_create' , 'App\Policies\TagPolicy@create');
        Gate::define('tag_edit' , 'App\Policies\TagPolicy@update');
        Gate::define('tag_delete' , 'App\Policies\TagPolicy@delete');
    }

    public function defineGateUser(){
        Gate::define('user_view', 'App\Policies\UserPolicy@view');
        Gate::define('user_create' , 'App\Policies\UserPolicy@create');
        Gate::define('user_edit' , 'App\Policies\UserPolicy@update');
        Gate::define('user_delete' , 'App\Policies\UserPolicy@delete');
    }

    public function defineGateRole(){
        Gate::define('role_view', 'App\Policies\RolePolicy@view');
        Gate::define('role_create' , 'App\Policies\RolePolicy@create');
        Gate::define('role_edit' , 'App\Policies\RolePolicy@update');
        Gate::define('role_delete' , 'App\Policies\RolePolicy@delete');
    }

    public function defineGatePermission(){
        Gate::define('permission_view', 'App\Policies\PermissionPolicy@view');
        Gate::define('permission_create' , 'App\Policies\PermissionPolicy@create');
        Gate::define('permission_edit' , 'App\Policies\PermissionPolicy@update');
        Gate::define('permission_delete' , 'App\Policies\PermissionPolicy@delete');
    }
}
