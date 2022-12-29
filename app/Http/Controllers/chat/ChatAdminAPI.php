<?php

namespace App\Http\Controllers\chat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\MessagePosted;

use App\Models\auth\Customer;
use App\Models\chat\Message;
use Auth;

class ChatAdminAPI extends Controller
{
    public function index()
    {
        return view('admin.chat.chatShow');
    }

    public function getAllUser(Request $request)
    {
        $users = Customer::where('id', '!=', 1)->get();
        return response()->json(['users' => $users]);
    }

    public function getMessages(Request $request, $user_id)
    {
        $messages = Message::with('user')->where('chatroom', '=', $user_id)->orderBy('created_at', 'asc')->get();
        return response()->json(['messages' => $messages]);
    }

    public function postMessage(Request $request, $user_id)
    {
        $message = new Message();

        $message->sender = 1;
        $message->chatroom = $user_id;
        $message->content = $request->input('content');

        $message->save();

        broadcast(new MessagePosted($message->load('user')))->toOthers();
        return response()->json(['message' => $message->load('user')]);
    }
}
