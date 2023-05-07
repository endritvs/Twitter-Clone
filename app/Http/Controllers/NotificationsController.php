<?php

namespace App\Http\Controllers;

use App\Models\Notifications;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function index()
    {
        $notifications = Notifications::with('fromUser:id,name,email,profile_pic')->where('user_id',auth()->user()->id)->latest()->paginate(10);
        return view('notifications.index',compact('notifications'));
    }
}
