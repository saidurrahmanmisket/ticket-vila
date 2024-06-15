<?php

namespace App\Http\Controllers\Web\User;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function index()
    {
        return view('user.layouts.settings');
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'first_name' => 'required|string|max:100',
                'last_name' => 'required|string|max:100',
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
                'email' => 'required|string|email|max:100|unique:users,email,'.Auth::user()->id,
            ],
                [
                    'avatar.max' => 'Max file size 2 MB',
                ]);
            $file = $request->file('avatar');
            if ($file) {
                $avatar = Helper::fileUpload($file, '/avatar/', time().'_'.pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
                if (! empty(Auth::user()->avatar)) {
                    Helper::deleteFile(public_path(Auth::user()->avatar));
                }
            } else {
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
        } catch (\Exception $e) {
            // Handle the exception
            Log::error($e->getMessage());

            return redirect()->route('user.settings')->with('error', $e->getMessage());
        }
    }

    //PASSWORD CHANGE
    public function updatePassword(Request $request)
    {

        $request->validate([
            'current_password' => 'required|string|min:6',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6',
        ]);
        $user = Auth::user();

        if (! Hash::check($request->current_password, $user->password)) {
            return redirect()->route('admin.profile.index')
                ->withErrors(['current_password' => 'The current password is incorrect.'])
                ->withInput();
        }
        $user->update([
            'password' => bcrypt($request->password),
        ]);

        flash()->addSuccess('Your password successfully updated.');

        return redirect()->route('admin.profile.index');
    }
}
