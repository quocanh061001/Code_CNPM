<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('admin/users/login', 'App\Http\Controllers\Admin\Users\LoginController@index')->name('login');

Route::post('admin/users/login/store', 'App\Http\Controllers\Admin\Users\LoginController@store');

Route::middleware(['auth'])->group(function(){

    Route::prefix('admin')->group(function(){
    Route::get('main', 'App\Http\Controllers\Admin\MainController@index')->name('admin');

    Route::prefix('thuonghieu')->group(function(){
          Route::get('add', 'App\Http\Controllers\Admin\ThuonghieuController@create');
          Route::post('add', 'App\Http\Controllers\Admin\ThuonghieuController@store');
    });
  });

});








