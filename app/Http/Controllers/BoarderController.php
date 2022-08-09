<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Bill;
use App\Models\BillUser;

use Illuminate\Support\Facades\Auth;

class BoarderController extends Controller
{
    public function index()
    {
        $unread = Notification::where('user_id', '=', Auth::user()->id)->where('status', '=', 'unread')->orderBY('created_at', 'DESC')->get();
        return view('dashboards.boarder.index', [
            'unread' => count($unread)
        ]);
    }

    public function notifications()
    {
        $notifications = Notification::where('user_id', '=', Auth::user()->id)->orderBY('created_at', 'DESC')->get();
        $ntf = $notifications;
        foreach($notifications as $notification)
        {
            $notify = Notification::find($notification->id);
            $notify->status = 'read';
            $notify->save();
        }
        return view('dashboards.boarder.notifications', [
            'notifications' => $ntf
        ]);
    }

    public function settings_view(){
        return view('dashboards.boarder.settings');
    }

    public function pay_bill_view($id)
    {
        $bill = Bill::find($id);
        $bill_user = BillUser::where('bill_id', '=', $id)->first();
        if(!$bill_user) return abort(404);
        if($bill->mess_id!=Auth::user()->mess_id) return abort(404);
        return view('dashboards.boarder.pay', [
            'bill' => $bill,
            'bill_user' => $bill_user
        ]);
    }

    public function submit_bill_information(Request $req)
    {
        $req->validate([
            'information' => 'required',
        ], [
            'information.required' => 'বিলের তথ্য দিন।'
        ]);

        $bill_user = BillUser::where('bill_id', '=', $req->id)->first();
        $bill_user->status = "submitted";
        $bill_user->information = $req->information;
        $bill_user->save();

        return redirect()->route('boarder.notifications')->with('flash', 'বিলের তথ্য সফলভাবে সাবমিট হয়েছে!');

    }
}
