<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function login()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            if (empty($googleUser)) {
                flash()->addWarning('Google login fail.');

                return redirect()->route('login');
            }

            $user = User::where('email', $googleUser->getEmail())->first();
            if (empty($user)) {
                $user = User::create([
                    'first_name' => $googleUser->user['given_name'],
                    'last_name' => $googleUser->user['family_name'],
                    'email' => $googleUser->getEmail(),
                    'password' => bcrypt(\Str::random(12)),
                    'email_verified_at' => now(),
                ]);
            }
            if ($user->email_verified_at === null) {
                $user->update([
                    'email_verified_at' => now(),
                ]);
            }
            \Auth::login($user);
            flash()->addSuccess('Logged in successfully.');
            if ($user->role == 'admin') {
                redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('user.dashboard');
            }
        } catch (\Exception $exception) {
            flash()->addError('Google Login Fail.');

            return redirect()->route('login');
        }
    }
}
