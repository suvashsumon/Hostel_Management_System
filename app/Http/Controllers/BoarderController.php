<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BoarderController extends Controller
{
    public function index()
    {
        return view('dashboards.boarder.index');
    }
}
