<?php
namespace App\Services;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserToken;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;

class ImageService
{
    public static function PutImage($image)
    {
       return  Storage::disk('avatar')->put('', $image);
        
    }  
     public static function PutPostImage($image)
    {
       return  Storage::disk('post')->put('', $image);
        
    }
    public static function getPostImages($user)
    {  
        $image_name = Image::where('user_id',"=",$user->id);
       
        if(is_null($image_name)){
            return 'soyj.jpg';
        }
        return $images->pluck('unique_name')->toArray();
    }
    public static function CreateImage($img_name,$img_type,$user_id){
        $image = Image::create([
            'unique_name' => $img_name,
            'img_type' => $img_type,
            'user_id' => $user_id
        ]);
        return $image;
    }
    public static function getImage($user)
    {  
        $image_name = Image::where('user_id',"=",$user->id)->first();
       
        if(is_null($image_name)){
            return 'soyj.jpg';
        }
        return $image_name->unique_name;
    }
}
