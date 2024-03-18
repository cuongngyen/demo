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

Route::get('/admin/user',[UserController::class,'GetUser'])->name('listUser');

Route::get('/admin/user/add',[UserController::class,'GetAdd']);
Route::post('/admin/user/add',[UserController::class,'PostAdd']);

Route::get('/admin/user/edit/{id}',[UserController::class,'GetEdit']);
Route::post('/admin/user/edit/{id}',[UserController::class,'PostEdit']);

Route::get('/admin/user/delete/{id}',[UserController::class,'delete']);
