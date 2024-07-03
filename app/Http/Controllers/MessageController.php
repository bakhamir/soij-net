<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Message;
class MessageController extends Controller
{
    public function LoadThePreviousMessages(Request $request){

        return Message::where(function($query) use ($request) {
            $query->where('from_user', auth()->user()->id)->where('to_user', $request->other);
        })->orWhere(function ($query) use ($request) {
            $query->where('from_user', $request->other)->where('to_user', auth()->user()->id);
        })->orderBy('created_at', 'ASC')->limit(10)->get();
    }
}
