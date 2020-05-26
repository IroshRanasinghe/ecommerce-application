<?php
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function (){
    Route::get('/login','Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login','Admin\LoginController@login')->name('admin.post.login');
    Route::get('/logout','Admin\LoginController@logout')->name('admin.logout');

    Route::middleware('auth:admin')->group(function (){
        Route::get('/', function () {
            return view('admin.dashboard.index');
        })->name('admin.dashboard');
    });
});


