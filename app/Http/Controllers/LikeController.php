<?php
namespace App\Http\Controllers;
use App\Models\Like;
use Illuminate\Http\Request;
use app\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function likeUser(Request $request)
    {
        $user = Auth::user();
        $like = Like::create([
            'profileId' => $user->profileId,
            'subscriptionId' => $user->subscriptionId,
            'userSentId' => $user->id,
            'userGetId' => $request->input('ReceiveUserId')
            ]);
    }
}
