<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    private Chat $chat;
    public function SendMessage(SendMessageRequest $request){
        $OtherUserId = User:where("name",$request->to)->first->id;

        if ($collection == false) {
            $chat = Chat::create([
                'user_id' => auth()->user()->id
            ]);
        
        $message = Message::create()([
            'from_user' => auth()->user()->id,
            'to_user' => $OtherUserId,
            'content' => $request->message,
            'chat_id' => $chat->id,
        ]);
    }
    public function IsTherePreviousChat($OtherUserId,$user_id){
        $collection = Message::whereHas('chat' , function($q) use ($OtherUserId,$user_id){
            $q->where('from_user',$OtherUserId)
                ->where('to_user', $user_id);
        })->orWhere(function ($q) use ($OtherUserId,$user_id) {
            $q->where('from_user',$user_id)
                ->where('to_user', $OtherUserId);
        })->get();

        if (count($collection) > 0){
            return $collection;
        }
        return false;
    }
}
// TODO: understand how to fetch user who is logged in