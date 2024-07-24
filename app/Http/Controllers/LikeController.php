<?php
namespace App\Http\Controllers;
use App\Models\Like;
use Illuminate\Http\Request;
use app\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use GuzzleHttp\Psr7\Response;

class LikeController extends Controller
{ 

    public function likeUser(Request $request)
    {
        // $user = Auth::user();
        $user = $request->user;
        
        //  dd($user->id);
        $like = Like::create([
              'profileId' => $user->profileId,
              'subscriptionId' => $user->subPlanId,
              'userSentId' => $user->id,
              'userGetId' => $request->input('ReceiveUserId')
         ]);


        return Response()->json($like,201);
        
    }
}
