<?php

use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function () {
    Route::get('/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Admin\LoginController@login')->name('admin.post.login');
    Route::get('/logout', 'Admin\LoginController@logout')->name('admin.logout');

    /**
     * Admin middleware
     */
    Route::middleware('auth:admin')->group(function () {
        /**
         * Dashboard index page
         */
        Route::get('/', function () {
            return view('admin.dashboard.index');
        })->name('admin.dashboard');

        /**
         *Admin settings section.
         */
        Route::get('/settings', 'Admin\SettingController@index')->name('admin.settings');
        Route::post('/settings', 'Admin\SettingController@update')->name('admin.settings.update');

        /**
         * Category section
         */
        Route::prefix('categories')->group(function () {
            Route::get('/', 'Admin\CategoryController@index')->name('admin.categories.index');
            Route::get('/create', 'Admin\CategoryController@create')->name('admin.categories.create');
            Route::post('/store', 'Admin\CategoryController@store')->name('admin.categories.store');
            Route::get('/{id}/edit', 'Admin\CategoryController@edit')->name('admin.categories.edit');
            Route::patch('/{id}/update', 'Admin\CategoryController@update')->name('admin.categories.update');
            Route::get('/{id}/destroy', 'Admin\CategoryController@destroy')->name('admin.categories.destroy');
        });

        /**
         * Attribute section
         */
        Route::prefix('attributes')->group(function (){
            Route::get('/', 'Admin\AttributeController@index')->name('admin.attributes.index');
            Route::get('/create', 'Admin\AttributeController@create')->name('admin.attributes.create');
            Route::post('/store', 'Admin\AttributeController@store')->name('admin.attributes.store');
            Route::get('/{id}/edit', 'Admin\AttributeController@edit')->name('admin.attributes.edit');
            Route::patch('/{id}/update', 'Admin\AttributeController@update')->name('admin.attributes.update');
            Route::get('/{id}/destroy', 'Admin\AttributeController@destroy')->name('admin.attributes.destroy');
        });

        /**
         * Brand section
         */
        Route::prefix('brands')->group(function (){
            Route::get('/', 'Admin\BrandController@index')->name('admin.brands.index');
            Route::get('/create', 'Admin\BrandController@create')->name('admin.brands.create');
            Route::post('/store', 'Admin\BrandController@store')->name('admin.brands.store');
            Route::get('/{id}/edit', 'Admin\BrandController@edit')->name('admin.brands.edit');
            Route::patch('/{id}/update', 'Admin\BrandController@update')->name('admin.brands.update');
            Route::get('/{id}/destroy', 'Admin\BrandController@destroy')->name('admin.brands.destroy');
        });

    });
});


