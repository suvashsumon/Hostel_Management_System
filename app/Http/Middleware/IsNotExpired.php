<?php

namespace App\Http\Middleware;

use Closure;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class IsNotExpired
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if ($user->role == 'mess_owner') {
            $exp_date = new DateTime($user->active_till);
            $currentDate = new DateTime(date('Y-m-d'));
            if ($currentDate <= $exp_date) {
                // Active
                //dd("Exp:".$exp_date->format("Y-m-d").' is latest than Cur:'.$currentDate->format("Y-m-d"));
                return $next($request);
            } else {
                // expired !!!!!!!
                //dd("Exp:".$exp_date->format("Y-m-d").' is older than Cur'.$currentDate->format("Y-m-d"));
                $user->status = 'expired';
                $user->save();
                return redirect()->route('expired');
            }
        }
        else if($user->role == 'mess_manager' || $user->role == 'mess_boarder'){
            $mess_owner = User::where('mess_id', '=', $user->mess_id)->where('role', '=', 'mess_owner')->first();
            $exp_date = new DateTime($mess_owner->active_till);
            $currentDate = new DateTime(date('Y-m-d'));
            if ($currentDate <= $exp_date) {
                // Active
                //dd("Exp:".$exp_date->format("Y-m-d").' is latest than Cur:'.$currentDate->format("Y-m-d"));
                return $next($request);
            } else {
                // expired !!!!!!!
                //dd("Exp:".$exp_date->format("Y-m-d").' is older than Cur'.$currentDate->format("Y-m-d"));
                $messOwner = User::find($mess_owner->id);
                $messOwner->status = 'expired';
                $messOwner->update();
                return abort(403);
            }
        }
    }
}
