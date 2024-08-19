<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Preference;
use App\Models\User;
use App\Services\ImageService;
class ProfileController extends BaseController
{

    protected $model = Profile::class;
    public function getPreferredProfiles(Request $request)
    {
        $user = $request->user;

        $userProfile = Profile::where('user_id', '=', $user->id)->first();
        $userPref = Preference::where('profileId', '=', $userProfile->id)->first();
        
        $minAge = $userPref->ageRangeMin;
        $maxAge = $userPref->ageRangeMax;
    
        $profiles = Profile::where('age', '>', $minAge)
            ->where('age', '<', $maxAge)
            ->where('sex', 'like', $userPref->sex)
            ->where('id','!=',$userProfile->id)
            ->take(500)
            ->get();
    
        $result = [];
    
        foreach ($profiles as $profile) {
            $imgUser = User::where('id','=',$profile->user_id)->first();
            $avatar = ImageService::getImage($imgUser);
            $imageUrl = asset('avatars/' . $avatar);
            $result[] = [
                'profile' => $profile,
                'avatar' => $imageUrl,
            ];
            
        }
    
        return response()->json($result, 200);
    }
    
    // public function create(Request $request){

    //     $profile = Profile::create($request->all());
    //     return response()->json($profile,201);
    // }
    // public function read(int $id)
    // {
    //     $profile = Profile::find($id);
    //     return response()->json($profile,200);
    // }
    // public function update(Request $request,int $id)
    // { 
    //     $profile = Profile::find($id);
    //     $profile->update($request->all());
    //     return response()->json($profile,201);
    // }
    // public function delete(int $id){    
    //  $profile = Profile::find($id);
    //  $profile->delete();
    //  return response()->json($profile,201);

    // }
    // public function uploadImage(Request $request){

    //     Storage::disk('avatar')->put('', $request->img);

    //     $image = Image::create([
    //         'img_name' => $request->file('img')->getClientOriginalName(),
    //         'img_type' => $request->file('img')->getClientOriginalExtension(),
    //         'user_id' => $request->input('id')
    //     ]);
    // }
}
