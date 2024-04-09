<?php

use App\Http\Controllers\admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryControllerController;


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


Route::group([
    'prefix' => 'admin/user', //add "admin" before link
], function () {
    // user admin
Route::get('/list',[UserController::class,'listUser'])->name('listUser');

Route::get('/add',[UserController::class,'addUser'])->name('addUser');
Route::post('/add',[UserController::class,'postaddUser'])->name('postaddUser');

Route::get('/edit/{id}',[UserController::class,'editUser'])->name('editUser');
Route::post('/edit/{id}',[UserController::class,'posteditUser'])->name('posteditUser');

Route::get('/delete/{id}',[UserController::class,'deleteUser'])->name('deleteUser');
});
    // end user admin

    // category
Route::group([
    'prefix' => 'admin/category', //add "admin" before link
], function () {
Route::get('/list',[CategoryController::class,'listCategory'])->name('listCategory');

Route::get('/add',[CategoryController::class,'createCategory'])->name('createCategory');
Route::post('/add',[CategoryController::class,'storeCategory'])->name('storeCategory'); 

Route::get('/edit/{id}',[CategoryController::class,'editCategory'])->name('editCategory');
Route::post('/edit/{id}',[CategoryController::class,'updateCategory'])->name('updateCategory');

Route::get('/delete/{id}',[CategoryController::class,'deleteCategory'])->name('deleteCategory');
});
    // end category

    //  product admin
Route::group([
    'prefix' => 'admin/product', //add "admin" before link
], function () {
Route::get('/list',[ProductController::class,'listProduct'])->name('listProduct');

Route::get('/add',[ProductController::class,'createProduct'])->name('createProduct');
Route::post('/add',[ProductController::class,'storeProduct'])->name('storeProduct');

Route::get('/edit/{id}',[ProductController::class,'editProduct'])->name('editProduct');
Route::post('/edit/{id}',[ProductController::class,'updateProduct'])->name('updateProduct');

Route::get('/delete/{id}',[ProductController::class,'deleteProduct'])->name('deleteProduct');

});
    // end product

