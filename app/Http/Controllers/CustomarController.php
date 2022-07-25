<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mess;

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
        return redirect()->back()->with('flash', 'Data updated succesfully');
    }

    public function new_registered_users()
    {
        $data = User::where('role', '=', 'new_user')->get();
        return view('dashboards.admin.normal_users', ['customars'=>$data]);
    }

    public function delete_user($id)
    {
        $user = User::find($id);
        //return $user;
        $user->delete();
        return redirect()->back()->with('flash','User is deleted.');
    }

    public function delete_mess_owner($id)
    {
        $user = User::find($id);
        $mess_id = $user->mess_id;
        $user->delete();

        $mess = Mess::find($mess_id);
        $mess->delete();

        return redirect()->back()->with('flash','User is deleted.');
    }

    public function give_owner_access(Request $req)
    {
        $customar_id = $req->customar_id;
        $expiry_date = $req->expiry_date;
        $mess = Mess::create([
            'name'=>'Your Mess'
        ]);
        $customar = User::find($customar_id);
        $customar->role = 'mess_owner';
        $customar->status = 'active';
        $customar->mess_id = $mess->id;
        $customar->active_till = $expiry_date;
        $customar->update();
        return redirect()->back()->with('flash', 'Data updated successfully');
    }

    public function deactivate_user($id)
    {
        $user = User::find($id);
        $user->status = 'inactive';
        $user->save();

        return back()->with('flash', 'User account has been deactivated!');
    }

    public function activate_user($id)
    {
        $user = User::find($id);
        $user->status = 'active';
        $user->save();

        return back()->with('flash', 'User account has been activated!');
    }
}
