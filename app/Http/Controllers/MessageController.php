<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Product;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //
    public function message_box()
    {
        $messages = Message::all();
        $rsproduct = Product::find(1);
        return view('message.message_box', compact('messages','rsproduct'));
    }

    public function send_message(Request $request){

    }
    public function viewMessages()
    {
        $messages = Message::all();
        return view('message.view_messages',compact('messages'));
    }

    public function getMessages($productId)
    {
        $product = Product::with('customer')->find($productId);
        return view('chat', compact('product'));
    }

    public function sendMessage(Request $request)
    {
        $chatMessage = new Message();
        $chatMessage->message = $request->message;
        $chatMessage->product_id = $request->product_id;
        $chatMessage->sender_id = $request->senderid;
        $chatMessage->receiver_id = $request->receiverid;
        $chatMessage->save();

        $messages = Message::where('product_id', $request->product_id)->get();
        return view('chatmessages', compact('messages'));
    }

    public function loadMessages($productId)
    {
        $messages = Message::where('product_id', $productId)->get();
        return view('chatmessages', compact('messages'));
    }

}
