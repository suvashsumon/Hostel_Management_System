<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileSettings extends Controller
{
    public function change_password(Request $req)
    {
        $req->validate(
            [
                'password' => 'required|min:8',
                'password_confirm' => 'required|same:password',
            ],
            [
                'password.min' =>
                    'পাসওয়ার্ড অবশ্যই ৮ বা তার অধিক অক্ষরের হতে হবে',
                'password.required' => 'নতুন পাসওয়ার্ড দিন',
                'password_confirm.required' => 'পুনরায় নতুন পাসওয়ার্ড দিন',
                'password_confirm.same' => 'পাসওয়ার্ড ম্যাচ করেনি!',
            ]
        );
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->password = \Hash::make($req->password);
        $user->update();
        return back()->with('flash', 'পাসওয়ার্ড চেঞ্জ সফল হয়েছে!');
    }

    public function change_personal_information(Request $req)
    {
        $req->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'phone_no' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|digits:11',
            ],
            [
                'name.required' => 'আপনার নাম লিখুন',
                'email.required' => 'আপনার ইমেইল লিখুন',
                'email.email' => 'সঠিক ইমেইল দিন',
                'phone_no.required' => 'আপনার মোবাইল নম্বর লিখুন',
                'phone_no.digits' => 'সঠিক মোবাইল নম্বর দিন',
                'phone_no.regex' => 'সঠিক মোবাইল নম্বর দিন',
            ]
        );

        $auth_user = Auth::user();

        $user = User::find($auth_user->id);
        $user->name = $req->name;
        $user->phone_no = $req->phone_no;
        $user->email = $req->email;
        $user->update();

        $auth_user->name = $req->name;
        $auth_user->phone_no = $req->phone_no;
        $auth_user->email = $req->email;
        $auth_user->save();

        return back()->with('flash', 'ব্যক্তিগত তথ্য পৰিবৰ্তন সফল হয়েছে');
    }

    public function changeProfilePic(Request $req)
    {
        $req->validate([
            'user_pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'user_pic.required' => 'ছবি নির্বাচন করুন',
            'user_pic.image' => 'সঠিক ফাইল নির্বাচন করুন',
            'user_pic.mimes' => 'সঠিক ফাইল নির্বাচন করুন',
            'user_pic.max' => 'ছবির সাইজ সর্বোচ্চ ২ মেগাবাইট হবে পারবে'
        ]);

        $imageName = time() . '.' . $req->user_pic->extension();
        try {
            $req->user_pic->move(public_path('images/user_pic'), $imageName);
        } catch (\Throwable $th) {
            return back()->with('flash', 'দুঃখিত, পরে আবার চেষ্টা করুন।');
        }
        

        $auth_user = Auth::user();

        $user = User::find($auth_user->id);
        $user->user_pic = $req->user_pic;
        $user->update();

        $auth_user->user_pic = $imageName;
        $auth_user->save();

        return back()->with('flash', 'প্রোফাইল পিকচার পরিবর্তন হয়েছে');
    }
}
