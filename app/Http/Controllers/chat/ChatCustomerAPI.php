<?php

namespace App\Http\Controllers\chat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\MessagePosted;

use App\Models\chat\Message;
use Auth;

class ChatCustomerAPI extends Controller
{
    public function getCurrentUser()
    {
        return Auth::guard('customer')->user();
    }

    public function getMessages()
    {
        $messages = Message::with('user')->where('chatroom', '=', Auth::guard('customer')->user()->id)->orderBy('created_at', 'asc')->get();
        return response()->json(['messages' => $messages]);
    }

    public function storeMessage(Request $request)
    {
        $message = new Message();
        
        $message->sender = Auth::guard('customer')->user()->id;
        $message->chatroom = Auth::guard('customer')->user()->id;
        $message->content = $request->input('content');

        $message->save();

        broadcast(new MessagePosted($message->load('user')))->toOthers();
        return response()->json(['message' => $message->load('user')]);
    }
}
