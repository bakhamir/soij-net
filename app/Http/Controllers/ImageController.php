<?php
namespace App\Http\Controllers;
use App\Models\Like;
use Illuminate\Http\Request;
use app\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Services\ImageService;
use GuzzleHttp\Psr7\Response;

class ImageController extends Controller
{ 

    public function getImage(Request $request)
    {
        $user = $request->user;
        $img_name = ImageService::getImage($user);
        $imageUrl = asset('avatars/' . $img_name);
        return response()->json(['image' => $imageUrl],200);
    }
}
