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
        Route::get('/edit/{id}', [
            'as' => 'category.post.edit',
            'uses' => 'App\Http\Controllers\AdminPostCategory@edit',
            'middleware' => (['CheckIsUser'])
        ]);
        Route::post('/update/{id}', [
            'as' => 'category.post.update',
            'uses' => 'App\Http\Controllers\AdminPostCategory@update',
            'middleware' => (['CheckIsUser'])
        ]);

        Route::get('/delete/{id}', [
            'as' => 'category.post.detele',
            'uses' => 'App\Http\Controllers\AdminPostCategory@delete',
            'middleware' => (['CheckIsUser'])
        ]);

        Route::post('/seleted-category', [
            'as' => 'category.post.seletedeleted',
            'uses' => 'App\Http\Controllers\AdminPostCategory@deleteSelected',
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


    //post
    Route::prefix('posts')->group(function () {
        Route::get('/', [
            'as' => 'post.index',
            'uses' => 'App\Http\Controllers\AdminPostController@index',
            'middleware' => (['CheckIsUser'])
        ]);
        Route::get('/create', [
            'as' => 'post.create',
            'uses' => 'App\Http\Controllers\AdminPostController@create',
            'middleware' => (['CheckIsUser'])
        ]);
        Route::post('/store', [
            'as' => 'post.store',
            'uses' => 'App\Http\Controllers\AdminPostController@store',
            'middleware' => (['CheckIsUser'])
        ]);
        Route::get('/edit/{id}', [
            'as' => 'post.edit',
            'uses' => 'App\Http\Controllers\AdminPostController@edit',
            'middleware' => (['CheckIsUser'])
        ]);
        Route::post('/update/{id}', [
            'as' => 'post.update',
            'uses' => 'App\Http\Controllers\AdminPostController@update',
            'middleware' => (['CheckIsUser'])
        ]);
        Route::get('/delete/{id}', [
            'as' => 'post.delete',
            'uses' => 'App\Http\Controllers\AdminPostController@delete',
            'middleware' => (['CheckIsUser'])
        ]);

        Route::post('/seleted-post', [
            'as' => 'post.deleteselect',
            'uses' => 'App\Http\Controllers\AdminPostController@deleteSelected',
            'middleware' => (['CheckIsUser'])
        ]);


        Route::get('/status-home/{id}', [
            'as' => 'post.statushome',
            'uses' => 'App\Http\Controllers\AdminPostController@changeStatusHome',
            'middleware' => (['CheckIsUser'])
        ]);

        Route::get('/status-product/{id}', [
            'as' => 'post.statusproduct',
            'uses' => 'App\Http\Controllers\AdminPostController@changeStatusShow',
            'middleware' => (['CheckIsUser'])
        ]);
    });



    Route::prefix('post-tags')->group(function () {
        Route::get('/', [
            'as' => 'tags.post.index',
            'uses' => 'App\Http\Controllers\AdminPostTags@index',
            'middleware' => (['CheckIsUser'])
        ]);
        Route::get('/create', [
            'as' => 'tags.post.create',
            'uses' => 'App\Http\Controllers\AdminPostTags@create',
            'middleware' => (['CheckIsUser'])
        ]);
        Route::post('/store', [
            'as' => 'tags.post.store',
            'uses' => 'App\Http\Controllers\AdminPostTags@store',
            'middleware' => (['CheckIsUser'])
        ]);
        Route::get('/edit/{id}', [
            'as' => 'tags.post.edit',
            'uses' => 'App\Http\Controllers\AdminPostTags@edit',
            'middleware' => (['CheckIsUser'])
        ]);
        Route::post('/update/{id}', [
            'as' => 'tags.post.update',
            'uses' => 'App\Http\Controllers\AdminPostTags@update',
            'middleware' => (['CheckIsUser'])
        ]);

        Route::get('/delete/{id}', [
            'as' => 'tags.post.detele',
            'uses' => 'App\Http\Controllers\AdminPostTags@delete',
            'middleware' => (['CheckIsUser'])
        ]);

        Route::post('/seleted-tags', [
            'as' => 'tags.post.seletedeleted',
            'uses' => 'App\Http\Controllers\AdminPostTags@deleteSelected',
            'middleware' => (['CheckIsUser'])
        ]);

        
    });






    //product tags
    Route::prefix('product-tags')->group(function () {
        Route::get('/', [
            'as' => 'tags.product.index',
            'uses' => 'App\Http\Controllers\AdminProductTags@index',
            'middleware' => (['CheckIsUser'])
        ]);
        Route::get('/create', [
            'as' => 'tags.product.create',
            'uses' => 'App\Http\Controllers\AdminProductTags@create',
            'middleware' => (['CheckIsUser'])
        ]);
        Route::post('/store', [
            'as' => 'tags.product.store',
            'uses' => 'App\Http\Controllers\AdminProductTags@store',
            'middleware' => (['CheckIsUser'])
        ]);
        Route::get('/edit/{id}', [
            'as' => 'tags.product.edit',
            'uses' => 'App\Http\Controllers\AdminProductTags@edit',
            'middleware' => (['CheckIsUser'])
        ]);
        Route::post('/update/{id}', [
            'as' => 'tags.product.update',
            'uses' => 'App\Http\Controllers\AdminProductTags@update',
            'middleware' => (['CheckIsUser'])
        ]);

        Route::get('/delete/{id}', [
            'as' => 'tags.product.detele',
            'uses' => 'App\Http\Controllers\AdminProductTags@delete',
            'middleware' => (['CheckIsUser'])
        ]);

        Route::post('/seleted-tags', [
            'as' => 'tags.product.seletedeleted',
            'uses' => 'App\Http\Controllers\AdminProductTags@deleteSelected',
            'middleware' => (['CheckIsUser'])
        ]);

        
    });



    //slider
    Route::prefix('slider')->group(function () {
        Route::get('/', [
            'as' => 'slider.index',
            'uses' => 'App\Http\Controllers\AdminSliderController@index',
            'middleware' => (['CheckIsUser'])
        ]);
        Route::get('/create', [
            'as' => 'slider.create',
            'uses' => 'App\Http\Controllers\AdminSliderController@create',
            'middleware' => (['CheckIsUser'])
        ]);
        Route::post('/store', [
            'as' => 'slider.store',
            'uses' => 'App\Http\Controllers\AdminSliderController@store',
            'middleware' => (['CheckIsUser'])
        ]);
        Route::get('/edit/{id}', [
            'as' => 'slider.edit',
            'uses' => 'App\Http\Controllers\AdminSliderController@edit',
            'middleware' => (['CheckIsUser'])
        ]);
        Route::post('/update/{id}', [
            'as' => 'slider.update',
            'uses' => 'App\Http\Controllers\AdminSliderController@update',
            'middleware' => (['CheckIsUser'])
        ]);

        Route::get('/delete/{id}', [
            'as' => 'slider.detele',
            'uses' => 'App\Http\Controllers\AdminSliderController@delete',
            'middleware' => (['CheckIsUser'])
        ]);

        Route::post('/seleted-slider', [
            'as' => 'slider.seletedeleted',
            'uses' => 'App\Http\Controllers\AdminSliderController@deleteSelected',
            'middleware' => (['CheckIsUser'])
        ]);
    });

    

    
    //product 
    Route::prefix('products')->group(function () {
        Route::get('/', [
            'as' => 'products.index',
            'uses' => 'App\Http\Controllers\AdminProductController@index',
            'middleware' => (['CheckIsUser'])
        ]);
        Route::get('/create', [
            'as' => 'products.create',
            'uses' => 'App\Http\Controllers\AdminProductController@create',
            'middleware' => (['CheckIsUser'])
        ]);
        Route::post('/store', [
            'as' => 'products.store',
            'uses' => 'App\Http\Controllers\AdminProductController@store',
            'middleware' => (['CheckIsUser'])
        ]);
        Route::get('/edit/{id}', [
            'as' => 'products.edit',
            'uses' => 'App\Http\Controllers\AdminProductController@edit',
            'middleware' => (['CheckIsUser'])
        ]);
        Route::post('/update/{id}', [
            'as' => 'products.update',
            'uses' => 'App\Http\Controllers\AdminProductController@update',
            'middleware' => (['CheckIsUser'])
        ]);
        Route::get('/delete/{id}', [
            'as' => 'products.delete',
            'uses' => 'App\Http\Controllers\AdminProductController@delete',
            'middleware' => (['CheckIsUser'])
        ]);

        Route::post('/seleted-post', [
            'as' => 'products.deleteselect',
            'uses' => 'App\Http\Controllers\AdminProductController@deleteSelected',
            'middleware' => (['CheckIsUser'])
        ]);


        Route::get('/status-home/{id}', [
            'as' => 'products.statushome',
            'uses' => 'App\Http\Controllers\AdminProductController@changeStatusHome',
            'middleware' => (['CheckIsUser'])
        ]);

        Route::get('/status-product/{id}', [
            'as' => 'products.statusproduct',
            'uses' => 'App\Http\Controllers\AdminProductController@changeStatusShow',
            'middleware' => (['CheckIsUser'])
        ]);

        Route::get('/delete-thumbnail/{id}', [
            'as' => 'products.deletethumbnail',
            'uses' => 'App\Http\Controllers\AdminProductController@deleteThumbnail',
            'middleware' => (['CheckIsUser'])
        ]);

    });

    //gallery 
    Route::prefix('gallerys')->group(function () {
        Route::get('/', [
            'as' => 'gallerys.index',
            'uses' => 'App\Http\Controllers\AdminGalleryController@index',
            'middleware' => (['CheckIsUser'])
        ]);
        Route::get('/create', [
            'as' => 'gallerys.create',
            'uses' => 'App\Http\Controllers\AdminGalleryController@create',
            'middleware' => (['CheckIsUser'])
        ]);
        Route::post('/store', [
            'as' => 'gallerys.store',
            'uses' => 'App\Http\Controllers\AdminGalleryController@store',
            'middleware' => (['CheckIsUser'])
        ]);
    });

});







Route::group(['prefix' => 'laravel-filemanager', 'middleware' => 'web'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
