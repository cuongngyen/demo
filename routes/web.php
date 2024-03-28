<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\ProductController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'prefix' => 'admin', //add "admin" before link
], function () {
    // user admin
Route::get('/user/list',[UserController::class,'getUser'])->name('listUser');

Route::get('/user/add',[UserController::class,'getAdd'])->name('getaddAdmin');
Route::post('/user/add',[UserController::class,'postAdd'])->name('postaddAdmin');

Route::get('/user/edit/{id}',[UserController::class,'getEdit'])->name('geteditAdmin');
Route::post('/user/edit/{id}',[UserController::class,'postEdit'])->name('posteditAdmin');

Route::get('/user/delete/{id}',[UserController::class,'getDelete'])->name('getdeleteAdmin');

    // end user admin

    // category
Route::get('/category/list',[ProductController::class,'getCategory'])->name('listCategory');

Route::get('/category/add',[ProductController::class,'getaddCategory'])->name('getaddCategory');
Route::post('/category/add',[ProductController::class,'postaddCategory'])->name('postaddCategory'); 

Route::get('/category/edit/{id}',[ProductController::class,'geteditCategory'])->name('geteditCategory');
Route::post('/category/edit/{id}',[ProductController::class,'posteditCategory'])->name('posteidtCategory');

Route::get('/category/delete/{id}',[ProductController::class,'getdeleteCategory'])->name('getdeleteCategory');

    // end category

    //  product admin
Route::get('/product/list',[ProductController::class,'getProduct'])->name('listProduct');

Route::get('/product/add',[ProductController::class,'getaddProduct'])->name('getaddProduct');
Route::post('/product/add',[ProductController::class,'postaddProduct'])->name('postaddProduct');

Route::get('/product/edit/{id}',[ProductController::class,'geteditProduct'])->name('geteditProduct');
Route::post('/product/edit/{id}',[ProductController::class,'posteditProduct'])->name('posteditProduct');

Route::get('/product/delete/{id}',[ProductController::class,'getdeleteProduct'])->name('getdeleteProduct');

    // end product
});


