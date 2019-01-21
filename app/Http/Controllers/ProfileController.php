<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
class ProfileController extends Controller
{
	public function createProfile(){
		return view('Profile.create');
	}

	public function create(Request $request){
		$this->validate($request,[
			'location'=>'nullable',
			'profile_picture'=>'image|max:1999|nullable'
		]);

		if($request->hasFile('profile_picture')){
			$fileNameWithExt = $request->file('profile_picture')->getClientOriginalName();
			$fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
			$ext = $request->file('profile_picture')->getClientOriginalExtension();
			$fileNameToStore = $fileName.'_'.time().'.'.$ext;
			$path = $request->file('profile_picture')->storeAs('public/ProfilePicture',$fileNameToStore);
			
		}else{
			$fileNameToStore = 'noimage.jpg';
		}

		$profile =new Profile;
		$profile->user_id=auth()->user()->id;
		$profile->location=$request->input('location');
		$profile->hobbies=$request->input('hobbies');
		$profile->bio=$request->input('bio');
		$profile->profile_picture=$fileNameToStore;
		$profile->save();
		return redirect('/profile/'.auth()->user()->username);
		
	}
	public function editProfile($id){
		$profile = profile::find($id);
		return view('Profile.edit')->with('profile',$profile);
	}

	public function updateProfile(Request $request, $id){
		$this->validate($request,[
			'location'=>'nullable',
			'profile_picture'=>'image|max:1999|nullable'
		]);

		if($request->hasFile('profile_picture')){

			$fileNameWithExt = $request->file('profile_picture')->getClientOriginalName();
			$fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
			$ext = $request->file('profile_picture')->getClientOriginalExtension();
			$fileNameToStore = $fileName.'_'.time().'.'.$ext;
			$path = $request->file('profile_picture')->storeAs('public/ProfilePicture',$fileNameToStore);
		}else{
			
		}

		$profile = Profile::find($id);
		$profile->location=$request->input('location');
		$profile->hobbies=$request->input('hobbies');
		$profile->bio=$request->input('bio');
		if($request->hasFile('profile_picture'))
		{
		$profile->profile_picture=$fileNameToStore;
		}
		$profile->save();
		return redirect('/profile/'.auth()->user()->username);

	}

    public function profile($username){
       
        $user = User::whereUsername($username)->first();
        
        if(!$user){
            abort(404);
        }
        return view('Profile.profile')->with(['user'=>$user]);
    }
   
}
