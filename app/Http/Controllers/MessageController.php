<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\User;

class MessageController extends Controller
{
    public function list($recipient)
    {
        $messages = Message::with('sender')->where('recipient', $recipient)->orderBy('created_at', 'desc')->find();

        return $messages;
    }

    public function delete($id)
    {
        Message::destroy($id);

        return redirect('/')->with('pop_up', 'Message deleted');
    }

    public function show($id)
    {
        $message = Message::where('id', $id)->first();
        $message->is_viewed = true;
        $message->save();

        $recipient = User::where('id', $message->recipient)->first();
        $sender = User::where('id', $message->sender)->first();

        return view('message.single', [
            'message' => $message,
            'recipient' => $recipient,
            'sender' => $sender
        ]);

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

    public function newAd(int $user)
    {

        $message = new Message();
        $message->sender = $user;
        $message->recipient = User::where('is_admin', true)->first()->id;

        $message->title = 'New Ad';
        $message->message_content = 'User '.$user.' has created a new ad, please validate';
        $message->is_viewed = false;
        $message->save();

        return;
    }
    public function matchAuthor()
    {
        $ads = Message::all();

        foreach ($ads as $ad) {
            $ad->sender = 2;
            $ad->recipient = 3;
            $ad->save();
        }
        return;
    }
}
