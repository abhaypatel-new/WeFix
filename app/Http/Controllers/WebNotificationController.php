<?php

namespace App\Http\Controllers;

use App\Model\Message;
use App\Model\Task;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Pusher\Pusher;

class WebNotificationController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    public function index()
    {
        return view('home');

    }
    public function notificationList()
    {
        $data = Message::where('is_read', 0)->get();
        return response()->json(['message' => 'data retrived', 'data' => $data]);
    }
    public function readNotification(Request $request, $id)
    {
        $data = Message::find($id);
        $read = $data->update(['is_read' => 1]);
        return response()->json(['message' => 'Message has been read', 'data' => $read]);
    }

    public function storeToken(Request $request)
    {

        $find = User::find($request->id);
        $find->update(['device_token' => $request->token]);
        return response()->json(['Token successfully stored.']);
    }

    public function sendWebNotification(Request $request)
    {
        // $id = Order::find($request->orderId);
        // dd($id);
        $url = 'https://fcm.googleapis.com/fcm/send';
        $FcmToken = User::whereNotNull('device_token')->where('id', $request->userId)->pluck('device_token')->all();

        $serverKey = 'AAAAdR10kIY:APA91bGq1qxRRGytQ-NBLDIIcOTAlNUY7PkabeHhw7Uq6kER4T4EFp_VX4ynKbWN-0tQ9BRXZCI06bokOJ5cgse9yq-EtQh0BJWaI52Jb2I8SGZPGKLyQM2Zzh4Y4R2Aekd1hKrhLceD';

        $data = [
            "registration_ids" => $FcmToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,
            ],
        ];
        $encodedData = json_encode($data);

        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // Execute post
        $result = curl_exec($ch);
        if ($result === false) {
            die('Curl failed: ' . curl_error($ch));
        }
        // Close connection
        curl_close($ch);
        // FCM response
        dd($result);
    }
    public function dashboard()
    {
        $notifications = DB::select("SELECT users.id, users.fname, users.lname, users.email, COUNT(is_read) AS unread FROM users LEFT JOIN messages ON users.id = messages.from AND messages.is_read = 0 WHERE users.id = " . Auth::id() . " GROUP BY users.id, users.fname, users.lname, users.email");

        return view('dashboard', compact('notifications', $notifications));
    }
    public function save_task(Request $request)
    {

        $task = new Task;
        $task->title = $request['title'];
        $task->description = $request['description'];
        $title = $request->title;

        $message = new Message;
        $message->from = Auth::user()->id;
        $id = $message->from;
        $message->message = $title;
        $message->save();

        $options = array(
            'cluster' => 'ap2',
            'useTLS' => true,
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data = ['from' => $id];
        $pusher->trigger('my-channel', 'my-event', $data);

        if ($task->save()) {
            // Session::flash('danger', 'Some thing went wrong!');
            // Session::flash('error', 'Some thing went wrong!');
            // Session::flash('success', 'Task Added Successfully');
            // Session::flash('info', 'Some thing went wrong!!');
            // Session::flash('alert-class', 'alert-success');
            return redirect()->back()->with('message', 'Task Added Successfully');
            // return response()->json(['status' => true, 'message' => 'Task Added Successfully']);
        }
    }
}
