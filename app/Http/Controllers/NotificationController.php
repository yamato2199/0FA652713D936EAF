<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use Illuminate\Support\Facades\Auth;


class NotificationController extends Controller
{
    //
    public function index()
    {
        return view("ucp/notify/index");
    }

    public function markRead($id)
    {
        $notefication = Auth::user()->notifications->find($id);
        $notefication->update([
            "read" => true
        ]);
        return redirect()->route('ucp.notify.index');
    }

    public function view($id)
    {
        //return $id;
        $notefication = Auth::user()->notifications->find($id);
        //return $notefication;
        return view("ucp/notify/view",compact('notefication'));
        
    }

    public function test()
    {
        return $this->send("Hello World","test...",2);
        
    }

    public function send($title,$body,$to)
    {
        $notify = Notification::create([
            'receiver_id' => $to,
            'sender_id' => Auth::user()->id,
            'title' => $title,
            'body' => $body
        ]);
        $notify->save();
        return "SEND";
    }
}
