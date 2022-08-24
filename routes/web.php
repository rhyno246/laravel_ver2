<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('frontend.home');
});
Route::get('/admin',  'App\Http\Controllers\AdminLoginController@login');


Route::post('/admin', [
    'as' => 'admin.login',
    'uses' => 'App\Http\Controllers\AdminLoginController@PostLogin'
]);

Route::get('/logout', [
    'as' => 'admin.logout',
    'uses' => 'App\Http\Controllers\AdminLoginController@logout'
]);


Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [
        'as' => 'backend.dashboard',
        'uses' => 'App\Http\Controllers\AdminDashBoardController@index'
    ]);
    
    //category
    Route::prefix('product-category')->group(function () {
        Route::get('/', [
            'as' => 'category.product.index',
            'uses' => 'App\Http\Controllers\AdminProductCategoryController@index'
        ]);
        Route::get('/create', [
            'as' => 'category.product.create',
            'uses' => 'App\Http\Controllers\AdminProductCategoryController@create'
        ]);
        Route::post('/store', [
            'as' => 'category.product.store',
            'uses' => 'App\Http\Controllers\AdminProductCategoryController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'category.product.edit',
            'uses' => 'App\Http\Controllers\AdminProductCategoryController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'category.product.update',
            'uses' => 'App\Http\Controllers\AdminProductCategoryController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'category.product.detele',
            'uses' => 'App\Http\Controllers\AdminProductCategoryController@delete'
        ]);

        Route::post('/seleted-category', [
            'as' => 'category.product.seletedeleted',
            'uses' => 'App\Http\Controllers\AdminProductCategoryController@deleteSelected'
        ]);
    });








    //permissions
    Route::prefix('permissions')->group(function () {
        Route::get('/create', [
            'as' => 'permissions.create',
            'uses' => 'App\Http\Controllers\AdminPermissionController@create'
        ]);
        Route::post('/store', [
            'as' => 'permissions.store',
            'uses' => 'App\Http\Controllers\AdminPermissionController@store'
        ]);
    });



    //roles
    Route::prefix('roles')->group(function () {
        Route::get('/', [
            'as' => 'role.index',
            'uses' => 'App\Http\Controllers\AdminRoleController@index'
        ]);
        Route::get('/create', [
            'as' => 'role.create',
            'uses' => 'App\Http\Controllers\AdminRoleController@create'
        ]);
        Route::post('/store', [
            'as' => 'role.store',
            'uses' => 'App\Http\Controllers\AdminRoleController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'role.edit',
            'uses' => 'App\Http\Controllers\AdminRoleController@edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'role.update',
            'uses' => 'App\Http\Controllers\AdminRoleController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'role.delete',
            'uses' => 'App\Http\Controllers\AdminRoleController@delete'
        ]);
        Route::post('/seleted-roles', [
            'as' => 'role.deleteselect',
            'uses' => 'App\Http\Controllers\AdminRoleController@deleteSelected'
        ]);
    });

    
    //settings
    Route::prefix('settings')->group(function () {
        Route::get('/', [
            'as' => 'settings.index',
            'uses' => 'App\Http\Controllers\AdminSettingController@index'
        ]);
        Route::get('/create', [
            'as' => 'settings.create',
            'uses' => 'App\Http\Controllers\AdminSettingController@create'
        ]);

        Route::get('/store', [
            'as' => 'settings.store',
            'uses' => 'App\Http\Controllers\AdminSettingController@store'
        ]);
    });

});
