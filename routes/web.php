<?php

use App\Http\Controllers\admin\CategoryController;
use Illuminate\Support\Facades\Route;
// admin
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryControllerController;
// users
use App\Http\Controllers\users\UsersController;
use App\Http\Controllers\users\HomeController;
use App\Http\Controllers\users\AccountController;
use App\Http\Controllers\users\ProductsController;

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
    'prefix' => 'admin', //add "admin" before link
], function () {
    Route::get('/logon',[UserController::class,'logon'])->name('logonAdmin');
    Route::post('/logon',[UserController::class,'storeLogon'])->name('storeLogon');

});

Route::group([
    'middleware' => 'adminlogin',
    'prefix' => 'admin/user', //add "admin" before link
], function () {
    // user admin
Route::get('/list',[UserController::class,'listUser'])->name('listUser');

Route::get('/add',[UserController::class,'addUser'])->name('addUser');
Route::post('/add',[UserController::class,'postaddUser'])->name('postaddUser');

Route::get('/edit/{id}',[UserController::class,'editUser'])->name('editUser');
Route::post('/edit/{id}',[UserController::class,'posteditUser'])->name('posteditUser');

Route::get('/delete/{id}',[UserController::class,'deleteUser'])->name('deleteUser');

Route::get('/logout',[UserController::class,'logout'])->name('logoutAdmin');
});
    // end user admin

    // category
Route::group([
    'middleware' => 'adminlogin',
    'prefix' => 'admin/category' //add "admin" before link
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
    'middleware' => 'adminlogin',
    'prefix' => 'admin/product' //add "admin" before link
], function () {
Route::get('/list',[ProductController::class,'listProduct'])->name('listProduct');

Route::get('/add',[ProductController::class,'createProduct'])->name('createProduct');
Route::post('/add',[ProductController::class,'storeProduct'])->name('storeProduct');

Route::get('/edit/{id}',[ProductController::class,'editProduct'])->name('editProduct');
Route::post('/edit/{id}',[ProductController::class,'updateProduct'])->name('updateProduct');

Route::get('/delete/{id}',[ProductController::class,'deleteProduct'])->name('deleteProduct');

Route::get('/productMember/{id}',[ProductController::class,'productMember'])->name('productMember');

Route::get('/editMember/{id}',[ProductController::class,'editMember'])->name('editMember');
Route::post('/editMember/{id}',[ProductController::class,'updateMember'])->name('updateMember');
});





        // USER


Route::group([
    'prefix' => 'users'
], function () {
    Route::get('/login',[UsersController::class,'login'])->name('loginUser');
    Route::post('/login',[UsersController::class,'storeLogin'])->name('storeLogin');

    Route::get('/register',[UsersController::class,'register'])->name('register');
    Route::post('/register',[UsersController::class,'storeRegister'])->name('storeRegister');

    Route::get('/index',[HomeController::class,'index'])->name('index');
});

Route::group([
    'middleware' => 'userlogin',
    'prefix' => 'users'
], function () {
    Route::get('/account',[AccountController::class,'account'])->name('account');
    Route::post('/account',[AccountController::class,'storeAccount'])->name('storeAccount');

    Route::get('/logout',[UsersController::class,'logout'])->name('logout');
    // product
});

Route::group([
    'middleware' => 'userlogin',
    'prefix' => 'users/product'
], function () {
    Route::get('/list',[ProductsController::class,'productList'])->name('listsProduct');

    Route::get('/add',[ProductsController::class,'createProduct'])->name('createsProduct');
    Route::post('/add',[ProductsController::class,'storeProduct'])->name('storesProduct');

    Route::get('/edit/{id}',[ProductsController::class,'editProduct'])->name('eidtsProduct');
    Route::post('/edit/{id}',[ProductsController::class,'updateProduct'])->name('updatesProduct');

    Route::get('/delete/{id}',[ProductsController::class,'deleteProduct'])->name('deletesProduct');

}); 
