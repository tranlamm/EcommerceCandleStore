<?php

namespace App\Http\Controllers\chat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    public function getMessages(Request $request)
    {
        $messages = Message::with('user')->where('chatroom', '=', $request->input('chatroom'))->orderBy('created_at', 'asc')->get();
        return response()->json(['messages' => $messages]);
    }

    public function postMessage(Request $request)
    {
        $message = new Message();

        $message->sender = 1;
        $message->chatroom = $request->input('chatroom');
        $message->content = $request->input('content');

        $message->save();
        return $response->json(['message' => $message->load('user')]);
    }
}
