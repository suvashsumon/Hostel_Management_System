<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        if($user && $user->status != 'inactive')
        {
            if($user->role == 'admin') return redirect()->route('admin.dashboard');
            if($user->role == 'mess_owner' || $user->role == 'mess_manager') return redirect()->route('authority.dashboard');
            if($user->role == 'mess_boarder') return redirect()->route('boarder.dashboard');
        }
        return view('home');
    }
}
