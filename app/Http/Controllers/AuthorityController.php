<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AuthorityController extends Controller
{
    public function index(){
        return view('dashboards.mess_authority.index');
    }

    public function expired_user()
    {
        $user = Auth::user();
        if($user && $user->status != 'expired')
        {
            if($user->role == 'admin') return redirect()->route('admin.dashboard');
            if($user->role == 'mess_owner' || $user->role == 'mess_manager') return redirect()->route('authority.dashboard');
            if($user->role == 'mess_boarder') return redirect()->route('boarder.dashboard');
        }
        return view('dashboards.mess_authority.expired');
    }
}
