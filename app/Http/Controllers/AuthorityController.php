<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

    public function all_boarder()
    {
        $data = User::where('mess_id', '=', Auth::user()->mess_id)->where('role', '=', 'mess_boarder')->get();
        return view('dashboards.mess_authority.all_boarders', ['boarders'=>$data]);
    }

    public function delete_boarder($id)
    {
        $boarder = User::find($id);
        $boarder->delete();
        return redirect()->back()->with('flash', 'Boarder is deleted successfully');
    }
}
