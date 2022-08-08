<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

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
}
