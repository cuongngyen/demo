<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\UserController;
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

Route::get('/admin/user',[UserController::class,'getUser'])->name('listUser');

Route::get('/admin/user/add',[UserController::class,'getAdd'])->name('getaddAdmin');
Route::post('/admin/user/add',[UserController::class,'postAdd'])->name('postaddAdmin');

Route::get('/admin/user/edit/{id}',[UserController::class,'getEdit'])->name('geteditAdmin');
Route::post('/admin/user/edit/{id}',[UserController::class,'postEdit'])->name('posteditAdmin');

Route::get('/admin/user/delete/{id}',[UserController::class,'Delete'])->name('getdeleteAdmin');
