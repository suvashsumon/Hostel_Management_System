<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;
use App\Models\GroupMember;


class GroupController extends Controller
{
    public function index()
    {
        $boarders = User::where('mess_id', '=', Auth::user()->mess_id)->where('role', '=', 'mess_boarder')->where('status', '=', 'active')->get();
        $groups = Group::where('mess_id', '=', Auth::user()->mess_id)->get();
        return view('dashboards.mess_authority.groups', ['boarders'=>$boarders, 'groups'=>$groups]);
    }

    public function create_group(Request $req)
    {
        $req->validate([
            'group_name' => 'required'
        ], [
            'group_name.required' => 'গ্রুপের নাম দিন'
        ]);

        $group_name = $req->group_name;
        $group_description = $req->description;
        $group_members = $req->boarder_select;
        
        $group = new Group();
        $group->name = $req->group_name;
        $group->description = $req->description;
        $group->mess_id = Auth::user()->mess_id;
        $group->save();
        if($group_members != null)
        {
            foreach ($group_members as $group_member) {
                $groupUser = new GroupMember();
                $groupUser->group_id = $group->id;
                $groupUser->user_id = $group_member;
                $groupUser->save();
            };
        }
    
        return back()->with('flash', 'গ্রুপ তৈরী সফল হয়েছে!');
    }

    public function delete_group($id)
    {
        $group = Group::find($id);
        $group->delete();

        return back()->with('flash', 'গ্রুপ ডিলিট করা হয়েছে!');
    }
}
