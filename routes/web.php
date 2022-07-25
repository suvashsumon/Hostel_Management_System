<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorityController;
use App\Http\Controllers\BoarderController;
use App\Http\Controllers\CustomarController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProfileSettings;

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
Route::get('/expired', [AuthorityController::class, 'expired_user'])->name('expired');

// admin routes
Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'isAdmin']], function(){
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/customar-list', [CustomarController::class, 'customar_list'])->name('customar.list');
    Route::get('/expired-inactive-customar-list', [CustomarController::class, 'expired_inactive_customars'])->name('inactive.expired.customar.list');
    Route::post('/expired-inactive-customar-list', [CustomarController::class, 'set_expiry_date'])->name('admin.set_expiry_date');
    Route::get('/new-user-list', [CustomarController::class, 'new_registered_users'])->name('new_registered_users');
    Route::post('/delete-user', [CustomarController::class, 'delete_user'])->name('admin.delete_user');
    Route::post('/give-owner-access', [CustomarController::class, 'give_owner_access'])->name('admin.give_owner_access');
});

// mess authority routes
Route::group(['prefix'=>'mess_auth', 'middleware'=>['auth', 'isAuthority', 'isActive', 'isNotExpired']], function(){
    Route::get('/dashboard', [AuthorityController::class, 'index'])->name('authority.dashboard');
    Route::get('/all-boarders', [AuthorityController::class, 'all_boarder'])->name('authority.all_boarders');
    Route::get('/delete-boarder/{id}', [AuthorityController::class, 'delete_boarder'])->name('authority.delete_boarder');
    Route::get('/add-boarder', [AuthorityController::class, 'add_boarder_view'])->name('authority.add_boarder');
    Route::post('/search-registered-user', [AuthorityController::class, 'search_registered_user'])->name('authority.search_registered_user');
    Route::post('/register-boarder', [AuthorityController::class, 'register_boarder'])->name('authority.register_boarder');
    Route::get('/deactivate-boarder/{id}', [AuthorityController::class, 'deactivate_boarder'])->name('authority.deactivate_boarder');
    Route::get('/activate-boarder/{id}', [AuthorityController::class, 'activate_boarder'])->name('authority.activate_boarder');
    Route::get('/managers', [ManagerController::class, 'index'])->name('authority.managers');
    Route::post('/add-manager', [ManagerController::class, 'add_by_phone'])->name('authority.add_by_phone');
    Route::post('/register-manager', [ManagerController::class, 'register_manager'])->name('authority.register_manager');
    Route::get('/delete-manager/{id}', [ManagerController::class, 'delete_manager'])->name('authority.delete_manager');
    Route::get('/settings', [AuthorityController::class, 'settings_view'])->name('authority.settings');
    Route::post('/change-password', [ProfileSettings::class, 'change_password'])->name('authority.change_password');
    Route::post('/change-personal-information', [ProfileSettings::class, 'change_personal_information'])->name('authority.change_personal_information');
});


// boarder routes
Route::group(['prefix'=>'boarder', 'middleware'=>['auth', 'isBoarder']], function(){
    Route::get('/dashboard', [BoarderController::class, 'index'])->name('boarder.dashboard');
});