<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\ThuonghieuController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Auth\Events\Login;
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
// 'App\Http\Controllers\HomeController@index'
Route::get('/', [HomeController::class, 'index']);

// 'App\Http\Controllers\Admin\Users\LoginController@index'
Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');

// 'App\Http\Controllers\Admin\Users\LoginController@store'
Route::post('admin/users/login/store', [LoginController::class, 'store']);

Route::middleware(['auth'])->group(function(){

    Route::prefix('admin')->group(function(){
      // 'App\Http\Controllers\Admin\MainController@index'
    Route::get('main', [MainController::class, 'index'])->name('admin');

    Route::prefix('thuonghieu')->group(function(){
      
          Route::get('add', [ThuonghieuController::class, 'create']);
          
          Route::post('add', [ThuonghieuController::class, 'store']);
          
          Route::get('index', [ThuonghieuController::class, 'index']);

          Route::get('edit/{id}', [ThuonghieuController::class, 'edit']);

          Route::post('update/{id}', [ThuonghieuController::class, 'update']);

          Route::get('delete/{id}', [ThuonghieuController::class, 'delete']);

    });
    Route::prefix('products')->group(function(){   
      Route::get('index', [ProductsController::class, 'index']);
      Route::get('add', [ProductsController::class, 'create']);
      

    });
  });

});








