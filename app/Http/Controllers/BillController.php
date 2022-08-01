<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\User;
use App\Models\Bill;
use App\Models\BillUser;
use App\Models\GroupMember;

class BillController extends Controller
{
    public function index()
    {
        $groups = Group::where('mess_id', '=', Auth::user()->mess_id)->get();
        $boarders = User::where('mess_id', '=', Auth::user()->mess_id)
            ->where('role', '=', 'mess_boarder')
            ->where('status', '=', 'active')
            ->get();
        $current_month_bill = Bill::where('month', '=', 'August')->where('year', '=', '2022')->get();
        return view('dashboards.mess_authority.bill', [
            'groups' => $groups,
            'boarders' => $boarders,
            'current_month_bill' => $current_month_bill
        ]);
    }

    private function isNotApplied($userId, $billId)
    {
        // check if this bill is already applied to user or not
        $data = BillUser::where('user_id', '=', $userId)
            ->where('bill_id', '=', $billId)
            ->get();
        if (count($data)==0) {
            // not applied yet
            return true;
        } else {
            // already applied
            return false;
        }
    }

    public function create_bill(Request $req)
    {
        $bill_title = $req->bill_name;
        $bill_month = $req->month;
        $bill_year = $req->year;
        $bill_amount = $req->amount;
        $bill_last_date = $req->last_date;
        $bill_apply_to = $req->apply_to;

        $bill = new Bill();
        $bill->name = $bill_title;
        $bill->month = $bill_month;
        $bill->year = $bill_year;
        $bill->amount = $bill_amount;
        $bill->last_date = $bill_last_date;
        $bill->mess_id = Auth::user()->mess_id;
        $bill->save();

        foreach ($bill_apply_to as $bapply) {
            $target = explode(';', $bapply);
            if ($target[0] == 'group') {
                // fetching the group members
                $groupMembers = GroupMember::where('group_id', '=', $target[1])->with('user')->get();
                // applied bill to active and notApplied user
                foreach ($groupMembers as $groupMember) {
                    //dd($this->isNotApplied($groupMember->user_id, $bill->id));
                    if (
                        $groupMember->user->status =
                            'active' &&
                            $this->isNotApplied($groupMember->user_id, $bill->id)
                    ) {
                        $billuser = new BillUser();
                        $billuser->bill_id = $bill->id;
                        $billuser->user_id = $groupMember->user_id;
                        $billuser->save();
                    }
                }
            } elseif ($target[0] == 'boarder') {
                $boarder = User::find($target[1]);
                //dd($this->isNotApplied($boarder->id, $bill->id));
                if (
                    $boarder->status =
                        'active' &&
                        $this->isNotApplied($boarder->id, $bill->id)
                ) {
                    $billuser = new BillUser();
                    $billuser->bill_id = $bill->id;
                    $billuser->user_id = $boarder->id;
                    $billuser->save();
                }
            }
        }

        return back()->with('flash', 'বিল তৈরী সফল হয়েছে!');
    }
}
