<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class ManagerController extends Controller
{
    public function index()
    {
        if(Auth::user()->role == 'mess_manager') return abort(401);

        $managers = User::where('mess_id', '=', Auth::user()->mess_id)->where('role', '=', 'mess_manager')->where('status', '=', 'active')->get();
        return view('dashboards.mess_authority.managers', ['managers'=>$managers]);
    }

    public function add_by_phone(Request $req)
    {
        if(Auth::user()->role == 'mess_manager') return abort(401);

        $user = User::where('phone_no', '=', $req->phone_no)
            ->where('role', '=', 'new_user')
            ->first();
        if ($user) {
            $mess_id = Auth::user()->mess_id;
            $user->mess_id = $mess_id;
            $user->role = 'mess_manager';
            $user->status = 'active';
            $user->last_subscribed = date('Y-m-d');
            $user->update();
            return back()->with('flash', 'ম্যানেজার যুক্তকরণ সফল হয়েছে!');
        } else {
            return back()->with('flash', 'দুঃখিত, ইউজার খুঁজে পাওয়া যায়নি !');
        }
    }

    public function register_manager(Request $req)
    {
        if(Auth::user()->role == 'mess_manager') return abort(401);

        $validatedData = $req->validate([
            'name' => 'required',
            'password' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'phone_no' => 'required|min:11|max:11|unique:users',
        ]);

        $boarder = new User();
        $boarder->name = $req->name;
        $boarder->phone_no = $req->phone_no;
        $boarder->email = $req->email;
        $boarder->password = \Hash::make($req->password);
        $boarder->role = 'mess_manager';
        $boarder->status = 'active';
        $boarder->mess_id = Auth::user()->mess_id;
        $boarder->last_subscribed = date('Y-m-d');
        $boarder->save();
        return back()->with('flash', 'ম্যানেজার রেজিস্টার সফল হয়েছে!');
    }

    public function delete_manager($id)
    {
        if(Auth::user()->role == 'mess_manager') return abort(401);
        
        $manager = User::find($id);
        $manager->delete();

        return back()->with('flash', 'ম্যানেজার ডিলিট করা হয়েছে!');
    }
}
