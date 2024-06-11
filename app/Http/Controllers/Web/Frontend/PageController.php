<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Enums\Page;
use App\Enums\Section;
use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\CMS;
use App\Models\FAQ;
use App\Models\Gift;
use App\Models\Team;
use App\Models\TheProcess;

class PageController extends Controller
{
    public function index()
    {
        $hero_section = CMS::where('page',Page::HOME)->where('section_name',Section::HERO)->where('status',Status::ACTIVE)->first();
        $theProcess = TheProcess::orderBy('sort_id','asc')->where('status',Status::ACTIVE)->get();

        $campaign = Campaign::latest()->where('status', 'published')->first();
        if ($campaign){
            $gift = Gift::where('status', 'active')->where('id', $campaign->gift_id)->first();
        }else{
            $gift = null;
        }


        return view('frontend.layouts.index',compact('hero_section','theProcess', 'gift'));
    }

    public function about()
    {
        $teams = Team::where('status', 'active')->get();
        $hero_section = CMS::where('page',Page::ABOUT_US)->where('section_name',Section::HERO)->where('status',Status::ACTIVE)->first();
        return view('frontend.layouts.about', compact('teams','hero_section'));
    }

    public function contact()
    {
        $hero_section = CMS::where('page',Page::CONTACT)->where('section_name',Section::HERO)->where('status',Status::ACTIVE)->first();
        return view('frontend.layouts.contact',compact('hero_section'));
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
        $hero_section = CMS::where('page',Page::THE_HOUSE())->where('section_name',Section::HERO)->where('status',Status::ACTIVE)->first();
        $campaign = Campaign::latest()->where('status', 'published')->first();
        if ($campaign){
        $gift = Gift::where('status', 'active')->where('id', $campaign->gift_id)->first();
            $giftImages = [
                'insideImage' => $gift->giftGallary->where('gift_image_type' , 'inside'),
                'outsideImage' => $gift->giftGallary->where('gift_image_type' , 'outside'),
                'planImage' => $gift->giftGallary->where('gift_image_type' , 'plan'),
            ];
        }else{
            $gift = null;
            $giftImages = null ;
        }

        return view('frontend.layouts.the-house', compact('hero_section', 'gift', 'giftImages'));
    }

    public function verifyEmail()
    {
        return view('auth.verify_otp');
    }

    public function howItWorks()
    {
        $hero_section = CMS::where('page',Page::HOW_IT_WORKS)->where('section_name',Section::HERO)->where('status',Status::ACTIVE)->first();
        return view('frontend.layouts.how-it-works', compact('hero_section'));
    }
}
