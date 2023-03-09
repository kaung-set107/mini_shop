<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\ItemController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\CategoryController;

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

Route::get('/',[HomeController::class,'home']);

//fashion
Route::get('/fashion',[HomeController::class,'fashion']);
//filter
Route::get('/filter',[HomeController::class,'filter']);
//detail
Route::get('/item/{slug}',[HomeController::class,'detail']);

//for side bar category list 
Route::get('/item/category/{slug}',[HomeController::class,'byCategory']);

//for search bar
Route::get('/search',[HomeController::class,'search']);

//admin auth
Route::get('/admin/login',[AuthController::class,'showLogin']);
Route::post('/admin/login',[AuthController::class,'postLogin']);

//authorzed for admin
Route::group(['middleware'=>'Admin','prefix'=>'admin'],function(){
    
    //CRUD of items
    Route::resource('/items',ItemController::class);

    //CRUD of category
    Route::resource('/category',CategoryController::class);

    //admin logout
    Route::get('/logout',[AuthController::class,'logout']);
});