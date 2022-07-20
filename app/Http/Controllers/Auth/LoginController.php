<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    public function redirectTo()
    {
        $user = Auth::user();
        $role = $user->role;
        if ($role =='new_user') {
            return route('home');
        } else if ($role == 'admin') {
            return route('admin.dashboard');
        } else if ($role == 'mess_owner') {
            return route('authority.dashboard');
        } else if ($role == 'mess_manager') {
            return route('authority.dashboard');
        } else if ($role == 'mess_boarder') {
            return route('boarder.dashboard');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'phone_no';
    }
}
