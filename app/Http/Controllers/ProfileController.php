<?php

namespace App\Http\Controllers;

use App\Http\Requests\profile\Profile as ProfileProfile;
use App\Http\Requests\StoreprofileRequest;
use App\Http\Requests\UpdateprofileRequest;
use App\Models\profile;
use App\Models\User;
use Flasher\Laravel\Http\Request;

class ProfileController extends Controller
{

    public function __construct(){
        $this->middleware('permission:profile-read')->only('index');
        $this->middleware('permission:profile-update')->only('update');

   }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = auth()->user();
        return view('admin.profile.index',compact('profile'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileProfile $request, User $profile)
    {


        $user = User::find($profile->id);

        $user->name = $request->name ;
        $user->email = $request->email ;

        if($request->password != null){
            $user->password = bcrypt($request->password) ;
        }
        $user->save() ;
        notify()->success(__('admin.updated_success'));
        return redirect()->route('admin.profile.index');

    }

}
