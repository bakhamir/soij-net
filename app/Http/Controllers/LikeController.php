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
              'userSentId' => $user->id,
              'userGetId' => $request->input('userGetId')
         ]);


        return Response()->json($like,201);
        
    }

    public function checkMatch(Request $request)
 {
    $user = $request->user; // текущий пользователь
    $targetUserId = $request->input('targetUserId'); // ID целевого пользователя

    // Проверяем, поставил ли текущий пользователь лайк целевому пользователю
    $userLikedTarget = Like::where('userSentId', $user->id)
        ->where('userGetId', $targetUserId)
        ->exists();

    // Проверяем, поставил ли целевой пользователь лайк текущему пользователю
    $targetLikedUser = Like::where('userSentId', $targetUserId)
        ->where('userGetId', $user->id)
        ->exists();

    // Если оба условия выполнены, это матч
    if ($userLikedTarget && $targetLikedUser) {
        return response()->json(['match' => true], 200);
    } else {
        return response()->json(['match' => false], 200);
    }
 }



}
