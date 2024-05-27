<?php

namespace App\Http\Controllers\Web\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.layouts.profile.index');
    }


    public function update(Request $request){
//        dd($request->file('avatar'));
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'avatar'=>'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'email' => 'required|string|email|max:100|unique:users,email,'.Auth::user()->id,
        ],
        [
            'avatar.max' => 'Max file size 2 MB',
        ]);
        $file = $request->file('avatar');
        if ($file){
            $avatar = Helper::fileUpload($file,'/uploads/avatar/',time().'_'.$file);
        }else{
            $avatar = Auth::user()->avatar;
        }
        //update profile
        Auth::user()->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'avatar' => $avatar,
            'email' => $request->email,
        ]);


        //Success message
        flash()->addSuccess('Your profile successfully updated.');
        return redirect()->route('admin.profile.index');
    }
}
