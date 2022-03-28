<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::prefix('authenticate')->group(function(){
    Route::get('/login','AdminAuthController@getLogin') -> name('admin.login');
    Route::post('/login','AdminAuthController@postLogin');
    Route::get('/logout','AdminAuthController@logoutAdmin') -> name('admin.logout');
});

Route::prefix('admin')->middleware('CheckLoginAdmin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.home');

    Route::group(['prefix' => 'menu-category'] , function(){
        Route::get('/','AdminMenuCategoryController@index') -> name('admin.get.list.menu-category');
        Route::get('/create','AdminMenuCategoryController@create') -> name('admin.get.create.menu-category');
        Route::post('/create','AdminMenuCategoryController@store');
        Route::get('/update/{id}','AdminMenuCategoryController@edit') -> name('admin.get.edit.menu-category');
        Route::post('/update/{id}','AdminMenuCategoryController@update');
        Route::get('/{action}/{id}','AdminMenuCategoryController@action') -> name('admin.get.action.menu-category');

    });

    Route::group(['prefix' => 'category'] , function(){
    	Route::get('/','AdminCategoryController@index') -> name('admin.get.list.category');
    	Route::get('/create','AdminCategoryController@create') -> name('admin.get.create.category');
    	Route::post('/create','AdminCategoryController@store');
    	Route::get('/update/{id}','AdminCategoryController@edit') -> name('admin.get.edit.category');
    	Route::post('/update/{id}','AdminCategoryController@update');
    	Route::get('/{action}/{id}','AdminCategoryController@action') -> name('admin.get.action.category');

    });

    Route::group(['prefix' => 'brand'] , function(){
        Route::get('/','AdminBrandsController@index') -> name('admin.get.list.brand');
        Route::get('/create','AdminBrandsController@create') -> name('admin.get.create.brand');
        Route::post('/create','AdminBrandsController@store');
        Route::get('/update/{id}','AdminBrandsController@edit') -> name('admin.get.edit.brand');
        Route::post('/update/{id}','AdminBrandsController@update');
        Route::get('/{action}/{id}','AdminBrandsController@action') -> name('admin.get.action.brand');

    });

    Route::group(['prefix' => 'product'] , function(){
    	Route::get('/','AdminProductController@index') -> name('admin.get.list.product');
    	Route::get('/create','AdminProductController@create') -> name('admin.get.create.product');
    	Route::post('/create','AdminProductController@store');
    	Route::get('/update/{id}','AdminProductController@edit') -> name('admin.get.edit.product');
    	Route::post('/update/{id}','AdminProductController@update');
    	Route::get('/{action}/{id}','AdminProductController@action') -> name('admin.get.action.product');

    });

    Route::group(['prefix' => 'article'] , function(){
        Route::get('/','AdminArticleController@index') -> name('admin.get.list.article');
        Route::get('/create','AdminArticleController@create') -> name('admin.get.create.article');
        Route::post('/create','AdminArticleController@store');
        Route::get('/update/{id}','AdminArticleController@edit') -> name('admin.get.edit.article');
        Route::post('/update/{id}','AdminArticleController@update');
        Route::get('/{action}/{id}','AdminArticleController@action') -> name('admin.get.action.article');

    });

    Route::group(['prefix' => 'transaction'] , function(){
        Route::get('/','AdminTransactionController@index') -> name('admin.get.list.transaction');
        Route::get('/view/{id}','AdminTransactionController@viewOrder') -> name('admin.get.view.order');
        Route::get('/{action}/{id}','AdminTransactionController@action') -> name('admin.get.action.transaction');
    });

    Route::group(['prefix' => 'user'] , function(){
        Route::get('/','AdminUserController@index') -> name('admin.get.list.user');

        Route::get('/{action}/{id}','AdminUserController@action') -> name('admin.get.action.user');
    });
    
    Route::group(['prefix' => 'contact'] , function(){
        Route::get('/','AdminContactController@index') ->name('admin.get.list.contact');
        Route::get('/{action}/{id}','AdminContactController@action') -> name('admin.get.action.contact');
    });

    Route::group(['prefix' => 'ratings'] , function(){
        Route::get('/','AdminRatingsController@index') ->name('admin.get.list.ratings');
    });

    Route::group(['prefix' => 'warehouse'] , function(){
        Route::get('/','AdminWarehouseController@index') ->name('admin.get.list.warehouse');
    });

    Route::group(['prefix' => 'revenue'] , function(){
        Route::get('/','AdminRevenueController@index') ->name('admin.get.list.revenue');
        Route::get('/view-month/{year}','AdminRevenueController@viewMonth') -> name('admin.get.view.month');

        Route::get('/view-online','AdminRevenueController@indexOnline') ->name('admin.get.list.revenue.online');
        Route::get('/view-month-online/{year}','AdminRevenueController@viewMonthOnline') -> name('admin.get.view.month.online');
    });

    Route::group(['prefix' => 'slider'] , function(){
        Route::get('/','AdminSliderController@index') -> name('admin.get.list.slider');
        Route::get('/create','AdminSliderController@create') -> name('admin.get.create.slider');
        Route::post('/create','AdminSliderController@store');
        Route::get('/update/{id}','AdminSliderController@edit') -> name('admin.get.edit.slider');
        Route::post('/update/{id}','AdminSliderController@update');
        Route::get('/{action}/{id}','AdminSliderController@action') -> name('admin.get.action.slider');
    });

    Route::group(['prefix' => 'banner'] , function(){
        Route::get('/','AdminBannerController@index') -> name('admin.get.list.banner');
        Route::get('/create','AdminBannerController@create') -> name('admin.get.create.banner');
        Route::post('/create','AdminBannerController@store');
        Route::get('/update/{id}','AdminBannerController@edit') -> name('admin.get.edit.banner');
        Route::post('/update/{id}','AdminBannerController@update');
        Route::get('/{action}/{id}','AdminBannerController@action') -> name('admin.get.action.banner');
    });

    Route::group(['prefix' => 'about'] , function(){
        Route::get('/','AdminAboutController@index') -> name('admin.get.list.about');
        Route::get('/update/{id}','AdminAboutController@edit') -> name('admin.get.edit.about');
        Route::post('/update/{id}','AdminAboutController@update');
    });

    Route::group(['prefix' => 'page-statics'] , function(){
        Route::get('/','AdminPageStaticsController@index') ->name('admin.get.list.page_statics');
        Route::get('/create','AdminPageStaticsController@create') -> name('admin.get.create.page_statics');
        Route::post('/create','AdminPageStaticsController@store');
        Route::get('/update/{id}','AdminPageStaticsController@edit') -> name('admin.get.edit.page_statics');
        Route::post('/update/{id}','AdminPageStaticsController@update');
        Route::get('/{action}/{id}','AdminPageStaticsController@action') -> name('admin.get.action.page_statics');
    });
});
