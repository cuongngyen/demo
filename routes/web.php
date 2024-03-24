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

Route::group([
    'prefix' => 'admin', //add "admin" before link
], function () {
Route::get('/user/list',[UserController::class,'getUser'])->name('listUser');

Route::get('/user/add',[UserController::class,'getAdd'])->name('getaddAdmin');
Route::post('/user/add',[UserController::class,'postAdd'])->name('postaddAdmin');

Route::get('/user/edit/{id}',[UserController::class,'getEdit'])->name('geteditAdmin');
Route::post('/user/edit/{id}',[UserController::class,'postEdit'])->name('posteditAdmin');

Route::get('/user/delete/{id}',[UserController::class,'getDelete'])->name('getdeleteAdmin');
});
