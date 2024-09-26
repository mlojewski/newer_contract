<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function list($recipient)
    {
        $messages = Message::with('sender')->where('recipient', $recipient)->find();

        return $messages;
    }

    public function delete($id)
    {
        Message::destroy($id);

        return;
    }

    public function show($id)
    {
        $message = Message::with('sender')->where('id', $id)->first();
        $message->is_viewed = true;
        $message->save();

        return $message;
    }

    public function store(Request $request)
    {
        $message = new Message();
        $message->title = $request->title;
        $message->is_viewed = false;

        if ($request->contact) {
            $message->sender = 1;
            $message->recipient = 1;
            $message->message_content = $request->name.' has the email '.$request->email.' and has sent the following -> '.$request->message_content;
        } else {
            $message->message_content = $request->message_content;
            $message->sender = $request->sender;
            $message->recipient = $request->recipient;
        }


        $message->save();

        return redirect()->back()->with('pop_up', 'Message sent');

    }
}
