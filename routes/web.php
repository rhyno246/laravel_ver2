<?php

use Illuminate\Support\Facades\Route;





Route::get('/', function () {
    return view('frontend.home');
});
Route::get('/admin',  'App\Http\Controllers\AdminLoginController@login');


Route::post('/admin', [
    'as' => 'admin.login',
    'uses' => 'App\Http\Controllers\AdminLoginController@PostLogin',
]);

Route::get('/logout', [
    'as' => 'admin.logout',
    'uses' => 'App\Http\Controllers\AdminLoginController@logout'
]);


Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [
        'as' => 'backend.dashboard',
        'uses' => 'App\Http\Controllers\AdminDashBoardController@index',
        'middleware' => ('CheckIsUser')
    ]);
    
    //product category
    Route::prefix('product-category')->group(function () {
        Route::get('/', [
            'as' => 'category.product.index',
            'uses' => 'App\Http\Controllers\AdminProductCategoryController@index',
            'middleware' => (['CheckIsUser','can:gate-category-view'])
        ]);
        Route::get('/create', [
            'as' => 'category.product.create',
            'uses' => 'App\Http\Controllers\AdminProductCategoryController@create',
            'middleware' => (['CheckIsUser' , 'can:gate-category-view'])
        ]);
        Route::post('/store', [
            'as' => 'category.product.store',
            'uses' => 'App\Http\Controllers\AdminProductCategoryController@store',
            'middleware' => (['CheckIsUser','can:gate-category-create'])
        ]);
        Route::get('/edit/{id}', [
            'as' => 'category.product.edit',
            'uses' => 'App\Http\Controllers\AdminProductCategoryController@edit',
            'middleware' => (['CheckIsUser','can:gate-category-update'])
        ]);
        Route::post('/update/{id}', [
            'as' => 'category.product.update',
            'uses' => 'App\Http\Controllers\AdminProductCategoryController@update',
            'middleware' => (['CheckIsUser','can:gate-category-update'])
        ]);
        Route::get('/delete/{id}', [
            'as' => 'category.product.detele',
            'uses' => 'App\Http\Controllers\AdminProductCategoryController@delete',
            'middleware' => (['CheckIsUser','can:gate-category-delete' ])
        ]);

        Route::post('/seleted-category', [
            'as' => 'category.product.seletedeleted',
            'uses' => 'App\Http\Controllers\AdminProductCategoryController@deleteSelected',
            'middleware' => (['CheckIsUser', 'can:gate-category-delete'])
        ]);
    });






    //post category
    Route::prefix('post-category')->group(function () {
        Route::get('/', [
            'as' => 'category.post.index',
            'uses' => 'App\Http\Controllers\AdminPostCategory@index',
            'middleware' => (['CheckIsUser'])
        ]);
        Route::get('/create', [
            'as' => 'category.post.create',
            'uses' => 'App\Http\Controllers\AdminPostCategory@create',
            'middleware' => (['CheckIsUser'])
        ]);
        Route::post('/store', [
            'as' => 'category.post.store',
            'uses' => 'App\Http\Controllers\AdminPostCategory@store',
            'middleware' => (['CheckIsUser'])
        ]);
    });






    //permissions
    Route::prefix('permissions')->group(function () {
        Route::get('/create', [
            'as' => 'permissions.create',
            'uses' => 'App\Http\Controllers\AdminPermissionController@create',
            'middleware' => (['CheckIsUser','can:gate-permissions-view'])
        ]);
        Route::post('/store', [
            'as' => 'permissions.store',
            'uses' => 'App\Http\Controllers\AdminPermissionController@store',
            'middleware' => (['CheckIsUser','can:gate-permissions-create'])
        ]);
    });


    //menu
    Route::prefix('menu')->group(function () {
        Route::get('/', [
            'as' => 'menu.index',
            'uses' => 'App\Http\Controllers\AdminMenuController@index',
            'middleware' => (['CheckIsUser'])
        ]);
        Route::get('/create', [
            'as' => 'menu.create',
            'uses' => 'App\Http\Controllers\AdminMenuController@create',
            'middleware' => (['CheckIsUser'])
        ]);
        Route::post('/store', [
            'as' => 'menu.store',
            'uses' => 'App\Http\Controllers\AdminMenuController@store',
            'middleware' => (['CheckIsUser'])
        ]);
        Route::get('/edit/{id}', [
            'as' => 'menu.edit',
            'uses' => 'App\Http\Controllers\AdminMenuController@edit',
            'middleware' => (['CheckIsUser'])
        ]);

        Route::post('/update/{id}', [
            'as' => 'menu.update',
            'uses' => 'App\Http\Controllers\AdminMenuController@update',
            'middleware' => (['CheckIsUser'])
        ]);
        Route::get('/delete/{id}', [
            'as' => 'menu.delete',
            'uses' => 'App\Http\Controllers\AdminMenuController@delete',
            'middleware' => (['CheckIsUser'])
        ]);

        Route::post('/seleted-menu', [
            'as' => 'menu.seletedeleted',
            'uses' => 'App\Http\Controllers\AdminMenuController@deleteSelected',
            'middleware' => (['CheckIsUser'])
        ]);

    });



    //roles
    Route::prefix('roles')->group(function () {
        Route::get('/', [
            'as' => 'role.index',
            'uses' => 'App\Http\Controllers\AdminRoleController@index',
            'middleware' => (['CheckIsUser','can:gate-role-view'])
        ]);
        Route::get('/create', [
            'as' => 'role.create',
            'uses' => 'App\Http\Controllers\AdminRoleController@create',
            'middleware' => (['CheckIsUser','can:gate-role-view'])
        ]);
        Route::post('/store', [
            'as' => 'role.store',
            'uses' => 'App\Http\Controllers\AdminRoleController@store',
            'middleware' => (['CheckIsUser','can:gate-role-create'])
        ]);

        Route::get('/edit/{id}', [
            'as' => 'role.edit',
            'uses' => 'App\Http\Controllers\AdminRoleController@edit',
            'middleware' => (['CheckIsUser', 'can:gate-role-update'])
        ]);

        Route::post('/update/{id}', [
            'as' => 'role.update',
            'uses' => 'App\Http\Controllers\AdminRoleController@update',
            'middleware' => (['CheckIsUser', 'can:gate-role-update'])
        ]);
        Route::get('/delete/{id}', [
            'as' => 'role.delete',
            'uses' => 'App\Http\Controllers\AdminRoleController@delete',
            'middleware' => (['CheckIsUser','can:gate-role-delete'])
        ]);
        Route::post('/seleted-roles', [
            'as' => 'role.deleteselect',
            'uses' => 'App\Http\Controllers\AdminRoleController@deleteSelected',
            'middleware' => (['CheckIsUser', 'can:gate-role-delete'])
        ]);
    });

    
    //settings
    Route::prefix('settings')->group(function () {
        Route::get('/', [
            'as' => 'settings.index',
            'uses' => 'App\Http\Controllers\AdminSettingController@index',
            'middleware' => (['CheckIsUser', 'can:gate-settings-view'])
        ]);
        Route::get('/create', [
            'as' => 'settings.create',
            'uses' => 'App\Http\Controllers\AdminSettingController@create',
            'middleware' => (['CheckIsUser', 'can:gate-settings-view'])
        ]);

        Route::post('/store', [
            'as' => 'settings.store',
            'uses' => 'App\Http\Controllers\AdminSettingController@store',
            'middleware' => (['CheckIsUser' , 'can:gate-settings-create'])
        ]);
        Route::get('/edit/{id}', [
            'as' => 'settings.edit',
            'uses' => 'App\Http\Controllers\AdminSettingController@edit',
            'middleware' => (['CheckIsUser', 'can:gate-settings-update'])
        ]);
        Route::post('/update/{id}', [
            'as' => 'settings.update',
            'uses' => 'App\Http\Controllers\AdminSettingController@update',
            'middleware' => (['CheckIsUser', 'can:gate-settings-update'])
        ]);
        Route::get('/delete/{id}', [
            'as' => 'settings.delete',
            'uses' => 'App\Http\Controllers\AdminSettingController@delete',
            'middleware' => (['CheckIsUser','can:gate-settings-delete'])
        ]);
        Route::post('/seleted-settings', [
            'as' => 'settings.deleteselect',
            'uses' => 'App\Http\Controllers\AdminSettingController@deleteSelected',
            'middleware' => (['CheckIsUser', 'can:gate-settings-delete'])
        ]);
    });

});
