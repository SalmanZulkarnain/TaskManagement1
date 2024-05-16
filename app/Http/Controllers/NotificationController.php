<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Events\NotificationCreated;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function showNotification(){
        return view('user.notification');
    }
    public function save(Request $request){
        $notification = Notification::create([
            'user_id' => Auth::id(),
            'message' => $request->message
        ]);
        event(new NotificationCreated($notification));
        return redirect()->back();
        
    }
}
