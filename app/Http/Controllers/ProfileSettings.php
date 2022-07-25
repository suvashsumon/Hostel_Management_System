<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileSettings extends Controller
{
    public function change_password(Request $req)
    {
        $req->validate([
            'password' => 'required|min:8',
            'password_confirm' => 'required|same:password'
        ],[
            'password.min' => 'পাসওয়ার্ড অবশ্যই ৮ বা তার অধিক অক্ষরের হতে হবে',
            'password.required' => 'নতুন পাসওয়ার্ড দিন',
            'password_confirm.required' => 'পুনরায় নতুন পাসওয়ার্ড দিন',
            'password_confirm.same' => 'পাসওয়ার্ড ম্যাচ করেনি!'
        ]);
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->password = \Hash::make($req->password);
        $user->update();
        return back()->with('flash', 'পাসওয়ার্ড চেঞ্জ সফল হয়েছে!');
    }
}
