<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CustomarController extends Controller
{
    public function customar_list()
    {
        $data = User::where('status', '=', 'active')->where('role', '=', 'mess_owner')->get();
        return view('dashboards.admin.customar_list', ['customars'=>$data]);
    }

    public function expired_inactive_customars()
    {
        $data = User::where('status', '!=', 'active')->where('role', '=', 'mess_owner')->get();
        return view('dashboards.admin.expired_inactive_customar_list', ['customars'=>$data]);
    }

    public function set_expiry_date(Request $req)
    {
        $customar_id = $req->customar_id;
        $expiry_date = $req->expiry_date;
        $user = User::find($customar_id);
        $user->status = 'active';
        $user->active_till = $expiry_date;
        $user->last_subscribed = strftime('%F');
        $user->update();
        return redirect()->route('inactive.expired.customar.list');
    }
}
