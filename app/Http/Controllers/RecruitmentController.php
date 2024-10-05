<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class RecruitmentController extends Controller
{
    public function store(Request $request){

        $ad = Ad::where('id', $request->ad)->first();
        $user = User::where('id', $request->sender)->first();

        $ad->people()->attach($user->person_id, [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        $ad->save();

        $messageController = new MessageController();
        $messageController->create(
            $request->title,
            $request->message_content,
            $request->sender,
            $request->recipient
        );

        return redirect('/')->with('pop_up', 'You have applied for this ad');

    }
}
