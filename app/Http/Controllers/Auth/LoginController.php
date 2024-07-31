<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @return string
     */
    // protected $redirectTo = '/';
    public function redirectTo()
    {
        $user = auth()->user(); // get the authenticated user
        //update last login and ip address
        $user->update([
            'last_login_at' => now(),
            'ip_address' => request()->ip(),
        ]);
        if ($user->role === 'admin') {
            if (has_any_permission([
                'dashboard live statics',
                'dashboard revenue details',
                'dashboard users details',
                'dashboard sales analytics',
                'dashboard sold today',
                'dashboard site visit',
                'dashboard affiliates details',
                'dashboard top country visits',
                'dashboard top affiliates user',
            ])) {
                return '/admin/dashboard';
            } else {
                return '/admin/profile';
            }

        }

        return '/dashboard';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
