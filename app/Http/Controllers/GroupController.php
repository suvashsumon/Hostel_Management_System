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

    public function view_group($id)
    {
        $group_information = Group::find($id);
        $group_members = GroupMember::where('group_id', '=', $id)->with('user')->get();
        $mess_boarders = User::where('mess_id', '=', Auth::user()->mess_id)->where('role', '=', 'mess_boarder')->get();
        foreach($mess_boarders as $mess_boarder)
        {
            $search = GroupMember::where('group_id', '=', $id)->where('user_id', '=', $mess_boarder->id)->get();
            if(count($search)==1) $mess_boarder['isMember'] = true;
            else $mess_boarder['isMember'] = false;
        }
        //return json_encode($mess_boarders);

        return view('dashboards.mess_authority.group_view', [
            'group_info' => $group_information,
            'group_members' => $group_members,
            'not_members' => $mess_boarders
        ]);
    }

    public function remove_group_member($id)
    {
        $group_member = GroupMember::find($id);
        $group_member->delete();

        return back()->with('flash', 'বোর্ডার গ্রুপ থেকে রিমুভ করা হয়েছে!');
    }

    public function update_group_info(Request $req)
    {
        $req->validate([
            'group_name' => 'required'
        ], [
            'group_name.required' => 'গ্রুপের নাম দিন'
        ]);
        $group_id = $req->group_id;
        $group_name = $req->group_name;
        $group_description = $req->description;

        $group = Group::find($group_id);
        $group->name = $group_name;
        $group->description = $group_description;
        $group->save();

        return back()->with('flash', 'গ্রুপের বিবরণ আপডেট করা হয়েছে!');
    }

    public function add_member_to_group(Request $req)
    {
        $group_id = $req->group_id;
        $group_members = $req->boarder_select;

        if($group_members != null)
        {
            foreach ($group_members as $group_member) {
                $groupUser = new GroupMember();
                $groupUser->group_id = $group_id;
                $groupUser->user_id = $group_member;
                $groupUser->save();
            };
        }

        return back()->with('flash', 'গ্রুপে নতুন বোর্ডার যুক্তকরণ সফল হয়েছে!');
    }
}
