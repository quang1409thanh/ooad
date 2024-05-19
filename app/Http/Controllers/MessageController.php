<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Message;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    //
    public function message_box()
    {
        $receivedMessages = Message::where('receiver_id', session('customer_id'))->get();

        $messageData = [];
        foreach ($receivedMessages as $message) {
            $sender = Customer::find($message->sender_id);
            // Kiểm tra xem có đối tượng Customer từ người gửi này chưa
            if (!array_key_exists($sender->customer_id, $messageData)) {
                $messageData[$sender->customer_id] = [
                    'customer' => $sender,
                    'messages' => [],
                ];
            }
            // Thêm tin nhắn vào mảng tin nhắn từ người gửi này
            $messageData[$sender->customer_id]['messages'][] = $message;
        }
        return view('message.message_box', compact('messageData',));
    }


    public function viewMessages()
    {
        $messages = Message::all();
        return view('message.view_messages', compact('messages'));
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


    public function store(Request $request)
    {
        $message = new Message();
        $message->sender_id = $request->input('senderid');
        $message->receiver_id = $request->input('receiverid');
        $message->message_date_time = now();
        $message->product_id = $request->input('productid');
        $message->message = $request->input('message');
        $message->status = 'Seller';
        $message->save();
        $messages_send = Message::where('product_id', $request->input('productid'))
            ->where('receiver_id', $request->input('receiverid'))
            ->where('sender_id', session('customer_id'))
            ->get();

        $messages_receive = Message::where('product_id', $request->input('productid'))
            ->where('sender_id', $request->input('receiverid'))
            ->where('receiver_id', session('customer_id'))
            ->get();

        $messages = $messages_send->merge($messages_receive)->sortBy('created_at');

        return view('chatmessage', compact('messages'));
    }

    public function store_box(Request $request)
    {
        $message = new Message();
        $message->sender_id = $request->input('senderid');
        $message->receiver_id = $request->input('receiverid');
        $message->message_date_time = now();
        $message->product_id = $request->input('productid');
        $message->message = $request->input('message');
        $message->status = 'Customer';
        $message->save();
        $messages_send = Message::where('product_id', $request->input('productid'))
            ->where('sender_id', session('customer_id'))
            ->where('receiver_id', $request->input('receiverid'))
            ->get();

        $messages_receive = Message::where('product_id', $request->input('productid'))
            ->where('receiver_id', session('customer_id'))
            ->where('sender_id', $request->input('receiverid'))
            ->get();
        $messages = $messages_send->merge($messages_receive)->sortBy('created_at');

        return view('chatmessages', compact('messages'));
    }

    public function loadMessages($productId)
    {
        $messages_send = Message::where('product_id', $productId)
            ->where('sender_id', session('customer_id'))
            ->get();

        $messages_receive = Message::where('product_id', $productId)
            ->where('receiver_id', session('customer_id'))
            ->get();
        $messages = $messages_send->merge($messages_receive)->sortBy('created_at');

        return view('chatmessage', compact('messages'));
    }

    public function loadBoxMessages($senderId)
    {
        $productId = request('product_id');
        // Lấy tất cả tin nhắn từ người gửi có senderId
//        $messages_receive = Message::where('product_id', $productId)
//            ->where('sender_id', $senderId)
//            ->orderBy('created_at', 'asc')
//            ->get();
//
//        // lấy tất cả tin nhắn mà mình đã gửi cho senderId
//        $messages_send = Message::where('product_id', $productId)
//            ->where('receiver_id', $senderId)
//            ->orderBy('created_at', 'asc')
//            ->get();

        $messages_send = Message::where('product_id', $productId)
            ->where('sender_id', session('customer_id'))
            ->where('receiver_id', $senderId)
            ->get();

        $messages_receive = Message::where('product_id', $productId)
            ->where('receiver_id', session('customer_id'))
            ->where('sender_id', $senderId)
            ->get();
        $messages = $messages_send->merge($messages_receive)->sortBy('created_at');
        return view('chatmessages', compact('messages'));
    }
}
