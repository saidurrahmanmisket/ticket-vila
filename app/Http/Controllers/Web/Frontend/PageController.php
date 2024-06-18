<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Enums\Page;
use App\Enums\Section;
use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\CMS;
use App\Models\DynamicPage;
use App\Models\FAQ;
use App\Models\Gift;
use App\Models\Team;
use App\Models\TheProcess;

class PageController extends Controller
{
    public function index()
    {
        $hero_section = CMS::where('page', Page::HOME)->where('section_name', Section::HERO)->where('status', Status::ACTIVE)->first();
        $theProcess = TheProcess::orderBy('sort_id', 'asc')->where('status', Status::ACTIVE)->get();
        $ticket_chance = CMS::where('page', Page::HOME)->where('section_name', Section::TICKET_CHANCE)->first();
        $wit_spin = CMS::where('page', Page::HOME)->where('section_name', Section::WIN_SPIN)->first();
        $houseTour = CMS::where('section_name', Section::TREE_D_HOUSE_TOUR)->first();

        $campaign = Campaign::latest()->where('status', 'published')->first();
        if ($campaign) {
            $gift = Gift::where('status', 'active')->where('id', $campaign->gift_id)->first();

            if ($gift && ! empty($gift)) {
                $giftRandomImages = $gift->giftGallary()
                    ->where(function ($query) {
                        $query->where('gift_image_type', 'inside')
                            ->orWhere('gift_image_type', 'outside');
                    })
                    ->inRandomOrder()
                    ->limit(20)
                    ->get();
            } else {
                $gift = null;
                $giftRandomImages = null;
            }
        } else {
            $gift = null;
            $giftRandomImages = null;
        }

        return view('frontend.layouts.index', compact('hero_section', 'houseTour', 'wit_spin', 'ticket_chance', 'theProcess', 'gift', 'giftRandomImages'));
    }

    public function about()
    {
        $teams = Team::where('status', 'active')->get();
        $the_mission = CMS::where('page', Page::ABOUT_US)->where('section_name', Section::THE_MISSION)->first();
        $hero_section = CMS::where('page', Page::ABOUT_US)->where('section_name', Section::HERO)->where('status', Status::ACTIVE)->first();
        $the_transparency = CMS::where('page', Page::ABOUT_US)->where('section_name', Section::THE_TRANSPARENCY)->where('status', Status::ACTIVE)->first();

        return view('frontend.layouts.about', compact('teams', 'hero_section', 'the_mission', 'the_transparency'));
    }

    public function contact()
    {
        $hero_section = CMS::where('page', Page::CONTACT)->where('section_name', Section::HERO)->where('status', Status::ACTIVE)->first();

        return view('frontend.layouts.contact', compact('hero_section'));
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
        $hero_section = CMS::where('page', Page::THE_HOUSE())->where('section_name', Section::HERO)->where('status', Status::ACTIVE)->first();
        $campaign = Campaign::latest()->where('status', 'published')->first();
        if ($campaign) {
            $gift = Gift::where('status', 'active')->where('id', $campaign->gift_id)->first();
            if ($gift && ! empty($gift)) {
                $giftImages = [
                    'insideImage' => $gift->giftGallary->where('gift_image_type', 'inside'),
                    'outsideImage' => $gift->giftGallary->where('gift_image_type', 'outside'),
                    'planImage' => $gift->giftGallary->where('gift_image_type', 'plan'),
                ];
            } else {
                $gift = null;
                $giftImages = null;
            }
        } else {
            $gift = null;
            $giftImages = null;
        }

        $houseTour = CMS::where('section_name', Section::TREE_D_HOUSE_TOUR)->first();
        $propertyView = CMS::where('section_name', Section::TREE_D_PROPERTY_VIEW)->first();

        return view('frontend.layouts.the-house', compact('hero_section', 'gift', 'giftImages', 'houseTour', 'propertyView'));
    }

    public function verifyEmail()
    {
        return view('auth.verify_otp');
    }

    public function howItWorks()
    {
        $hero_section = CMS::where('page', Page::HOW_IT_WORKS)->where('section_name', Section::HERO)->where('status', Status::ACTIVE)->first();
        $theProcess = TheProcess::orderBy('sort_id', 'asc')->where('status', Status::ACTIVE)->get();

        return view('frontend.layouts.how-it-works', compact('hero_section', 'theProcess'));
    }

    public function dynamicPage(string $page_slug)
    {
        $pageData = DynamicPage::where('status', 'active')
            ->where('page_slug', $page_slug)
            ->first();

        if (! $pageData) {
            abort(404);
        }

        return view('frontend.layouts.dynamic-page', compact('pageData'));
    }

    public function faq(){

        $faqs = FAQ::where('status', 'active')->paginate(20);

        return view('frontend.layouts.faqs', compact('faqs'));

    }
}
