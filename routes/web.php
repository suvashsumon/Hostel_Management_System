<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorityController;
use App\Http\Controllers\BoarderController;
use App\Http\Controllers\CustomarController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProfileSettings;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\BillController;

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
Route::get('/account-expired', [AuthorityController::class, 'expired_user'])->name('expired');
Route::get('/account-deactivated', [AuthorityController::class, 'deactive_account'])->name('deactivated');

// admin routes
Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'isAdmin']], function(){
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/customar-list', [CustomarController::class, 'customar_list'])->name('customar.list');
    Route::get('/expired-inactive-customar-list', [CustomarController::class, 'expired_inactive_customars'])->name('inactive.expired.customar.list');
    Route::post('/expired-inactive-customar-list', [CustomarController::class, 'set_expiry_date'])->name('admin.set_expiry_date');
    Route::get('/new-user-list', [CustomarController::class, 'new_registered_users'])->name('new_registered_users');
    Route::get('/delete-user/{id}', [CustomarController::class, 'delete_user'])->name('admin.delete_user');
    Route::get('/delete-mess-owner/{id}', [CustomarController::class, 'delete_mess_owner'])->name('admin.delete_mess_owner');
    Route::post('/give-owner-access', [CustomarController::class, 'give_owner_access'])->name('admin.give_owner_access');
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::post('/change-password', [ProfileSettings::class, 'change_password'])->name('admin.change_password');
    Route::post('/change-personal-information', [ProfileSettings::class, 'change_personal_information'])->name('admin.change_personal_information');
    Route::post('/change-profile-pic', [ProfileSettings::class, 'changeProfilePic'])->name('admin.change_profile_pic');
    Route::get('/deactivate-user/{id}', [CustomarController::class, 'deactivate_user'])->name('admin.deactivate_user');
    Route::get('/activate-user/{id}', [CustomarController::class, 'activate_user'])->name('admin.activate_user');
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
    Route::post('/change-profile-pic', [ProfileSettings::class, 'changeProfilePic'])->name('authority.change_profile_pic');
    Route::get('/groups', [GroupController::class, 'index'])->name('authority.groups');
    Route::post('/create-groups', [GroupController::class, 'create_group'])->name('authority.create_groups');
    Route::get('/delete-group/{id}', [GroupController::class, 'delete_group'])->name('authority.delete_groups');
    Route::get('/view-group/{id}', [GroupController::class, 'view_group'])->name('authority.view_groups');
    Route::get('/remove-group-member/{id}', [GroupController::class, 'remove_group_member'])->name('authority.remove_group_member');
    Route::post('/update-group-info', [GroupController::class, 'update_group_info'])->name('authority.update_group_info');
    Route::post('/add-member-to-group', [GroupController::class, 'add_member_to_group'])->name('authority.add_member_to_group');
    Route::get('/bill-index', [BillController::class, 'index'])->name('authority.bill_index');
    Route::post('/create-bill', [BillController::class, 'create_bill'])->name('authority.create_bill');
    Route::get('/delete-bill/{id}', [BillController::class, 'delete_bill'])->name('authority.delete_bill');
    Route::get('/bill-details/{id}', [BillController::class, 'view_bill'])->name('authority.view_bill');
    Route::post('/edit-bill', [BillController::class, 'edit_bill'])->name('authority.edit_bill');
    Route::get('/delete-bill-user/{id}', [BillController::class, 'delete_bill_user'])->name('authority.delete_bill_user');
    Route::get('/bill-history', [BillController::class, 'bill_history'])->name('authority.bill_history');
});


// boarder routes
Route::group(['prefix'=>'boarder', 'middleware'=>['auth', 'isBoarder']], function(){
    Route::get('/dashboard', [BoarderController::class, 'index'])->name('boarder.dashboard');
});