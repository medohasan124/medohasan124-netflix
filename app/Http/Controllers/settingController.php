<?php

namespace App\Http\Controllers;

use App\Http\Requests\setting\updateRequest;
use App\Models\setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class settingController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct(){
        $this->middleware('permission:settings-read')->only('index');
        $this->middleware('permission:settings-update')->only('update');

   }
    public function index()
    {
        $setting = setting::first();
        return view('admin.setting.index',compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     */



    /**
     * Update the specified resource in storage.
     */
    public function update(updateRequest $request, setting $setting)
    {
        $settings = setting::get()->first() ;
        $settings->email = $request->email ;
        $settings->keywords = $request->keywords ;
        $settings->description = $request->description ;

        if($request->image){
             Storage::disk('local')->delete('public/uploads/'.$settings->image);
            $request->image->store('public/uploads');
            $settings->image = $request->image->hashName() ;
        }
        $settings->save() ;
        notify()->success(__('admin.updated_success'));
        return redirect()->route('admin.setting.index');

    }

}
