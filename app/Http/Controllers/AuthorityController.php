<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorityController extends Controller
{
    public function index(){
        return view('dashboards.mess_authority.index');
    }

    public function expired_user()
    {
        return view('dashboards.mess_authority.expired');
    }
}
