<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorityController;
use App\Http\Controllers\BoarderController;

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
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// admin routes
Route::group(['prefix'=>'admin', 'middleware'=>[]], function(){
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

// mess authority routes
Route::group(['prefix'=>'mess_auth', 'middleware'=>[]], function(){
    Route::get('/dashboard', [AuthorityController::class, 'index'])->name('authority.dashboard');
});


// boarder routes
Route::group(['prefix'=>'boarder', 'middleware'=>[]], function(){
    Route::get('/dashboard', [BoarderController::class, 'index'])->name('boarder.dashboard');
});