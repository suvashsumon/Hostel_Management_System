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
}
