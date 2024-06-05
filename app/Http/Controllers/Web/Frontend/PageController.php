<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Team;

class PageController extends Controller
{
    public function index()
    {
        return view('frontend.layouts.index');
    }

    public function about()
    {
        $teams = Team::where('status', 'active')->get();

        return view('frontend.layouts.about', compact('teams'));
    }

    public function contact()
    {
        return view('frontend.layouts.contact');
    }

    public function imprint()
    {
        return view('frontend.layouts.imprint');
    }

    public function login()
    {
        return view('frontend.layouts.login');
    }

    public function privacy()
    {
        return view('frontend.layouts.privacy');
    }

    public function rules()
    {
        return view('frontend.layouts.raffle-rules');
    }

    public function signUp()
    {
        return view('frontend.layouts.sign-up');
    }

    public function support()
    {
        return view('frontend.layouts.support');
    }

    public function terms()
    {
        return view('frontend.layouts.terms');
    }

    public function theHouse()
    {
        return view('frontend.layouts.the-house');
    }

    public function verifyEmail()
    {
        return view('auth.verify_otp');
    }

    public function howItWorks()
    {
        return view('frontend.layouts.how-it-works');
    }
}
