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
}
