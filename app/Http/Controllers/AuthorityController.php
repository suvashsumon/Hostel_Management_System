<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Http\Request;

class AuthorityController extends Controller
{
    public function index()
    {
        return view('dashboards.mess_authority.index');
    }

    public function settings_view()
    {
        return view('dashboards.mess_authority.settings');
    }

    public function expired_user()
    {
        $user = Auth::user();
        if ($user && $user->status != 'expired') {
            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard');
            }
            if ($user->role == 'mess_owner' || $user->role == 'mess_manager') {
                return redirect()->route('authority.dashboard');
            }
            if ($user->role == 'mess_boarder') {
                return redirect()->route('boarder.dashboard');
            }
        }
        return view('dashboards.mess_authority.expired');
    }

    public function all_boarder()
    {
        $data = User::where('mess_id', '=', Auth::user()->mess_id)
            ->where('role', '=', 'mess_boarder')
            ->get();
        return view('dashboards.mess_authority.all_boarders', [
            'boarders' => $data,
        ]);
    }

    public function delete_boarder($id)
    {
        $boarder = User::find($id);
        $boarder->delete();
        return redirect()
            ->back()
            ->with('flash', 'Boarder is deleted successfully');
    }

    public function add_boarder_view()
    {
        return view('dashboards.mess_authority.add_border', ['user' => null]);
    }

    public function search_registered_user(Request $req)
    {
        $user = User::where('phone_no', '=', $req->phone_no)
            ->where('role', '=', 'new_user')
            ->first();
        if ($user) {
            $mess_id = Auth::user()->mess_id;
            $user->mess_id = $mess_id;
            $user->role = 'mess_boarder';
            $user->status = 'active';
            $user->last_subscribed = date('Y-m-d');
            $user->update();
            return back()->with('flash', 'বোর্ডার যুক্তকরণ সফল হয়েছে!');
        } else {
            return back()->with('flash', 'দুঃখিত, ইউজার খুঁজে পাওয়া যায়নি !');
        }
    }

    public function register_boarder(Request $req)
    {

        $validatedData = $req->validate([
            'name' => 'required',
            'password' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'phone_no' => 'required|min:11|max:11|unique:users'
        ]);

        $boarder = new User();
        $boarder->name = $req->name;
        $boarder->phone_no = $req->phone_no;
        $boarder->email = $req->email;
        $boarder->password = \Hash::make($req->password);
        $boarder->role = 'mess_boarder';
        $boarder->status = 'active';
        $boarder->mess_id = Auth::user()->mess_id;
        $boarder->last_subscribed = date('Y-m-d');
        $boarder->save();
        return back()->with('flash', 'বোর্ডার রেজিস্টার সফল হয়েছে!');
    }

    public function deactivate_boarder($id)
    {
        $user = User::find($id);
        $user->status = 'inactive';
        $user->update();

        return back()->with('flash', 'বোর্ডারের একাউন্টটি বন্ধ হয়েছে!');
    }

    public function activate_boarder($id)
    {
        $user = User::find($id);
        $user->status = 'active';
        $user->update();

        return back()->with('flash', 'বোর্ডারের একাউন্টটি চালু হয়েছে!');
    }
}
