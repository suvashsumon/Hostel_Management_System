<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\User;

class BillController extends Controller
{
    public function index()
    {
        $groups = Group::where('mess_id', '=', Auth::user()->mess_id)->get();
        $boarders = User::where('mess_id', '=', Auth::user()->mess_id)->where('role', '=', 'mess_boarder')->where('status', '=', 'active')->get();
        return view('dashboards.mess_authority.bill', [
            'groups' => $groups,
            'boarders' => $boarders
        ]);
    }
}
