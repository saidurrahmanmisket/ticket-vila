<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Enums\NotificationType;
use App\Enums\Page;
use App\Enums\Section;
use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Campaign;
use App\Models\CMS;
use App\Models\DynamicPage;
use App\Models\EbookDescription;
use App\Models\FAQ;
use App\Models\Gift;
use App\Models\HighlightImage;
use App\Models\RaffleRules;
use App\Models\Team;
use App\Models\TheProcess;
use App\Models\User;
use App\Notifications\NewNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function index()
    {
        $hero_section = CMS::where('page', Page::HOME)->where('section_name', Section::HERO)->where('status', Status::ACTIVE)->first();
        $theProcess = TheProcess::orderBy('sort_id', 'asc')->where('status', Status::ACTIVE)->get();
        $ticket_chance = CMS::where('page', Page::HOME)->where('section_name', Section::TICKET_CHANCE)->first();
        $wit_spin = CMS::where('page', Page::HOME)->where('section_name', Section::WIN_SPIN)->first();
        $houseTour = CMS::where('section_name', Section::VISIT_YOUR_NEW_HOME)->first();

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

        return view('frontend.layouts.index', compact('hero_section', 'campaign', 'houseTour', 'wit_spin', 'ticket_chance', 'theProcess', 'gift', 'giftRandomImages'));
    }

    public function about()
    {
        //        for make notifications
//        $user = \Auth::user();
//        $message = "Something Went Wrong";
////
//        $user->notify(new NewNotification(
//            from: 'ebook@ticketvilla.eu',
//            owner: 'Admin',
//            subject: "Error",
//            message: $message,
//            actionText: 'Buy Ebook',
//            actionUrl: '/buy-ebook',
//            channels: [ 'mail', 'database'],
//            type: NotificationType::ERROR
//
//        ));


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
        $hero_section = CMS::where('page', Page::Raffle_Rules)->where('section_name', Section::HERO)->where('status', Status::ACTIVE)->first();
        $raffleRules = RaffleRules::orderBy('sort_id', 'asc')->where('status', Status::ACTIVE)->get();
        $the_transparency = CMS::where('page', Page::Raffle_Rules)->where('section_name', Section::THE_TRANSPARENCY)->where('status', Status::ACTIVE)->first();

        return view('frontend.layouts.raffle-rules', compact('hero_section', 'raffleRules', 'the_transparency'));
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
        $hero_section = CMS::where('page', Page::THE_HOUSE)->where('section_name', Section::HERO)->where('status', Status::ACTIVE)->first();
        $campaign = Campaign::latest()->where('status', 'published')->first();
        if ($campaign) {
            $gift = Gift::where('status', 'active')->where('id', $campaign->gift_id)->first();
            if ($gift && ! empty($gift)) {
                $giftImages = [
                    'insideImage' => $gift->giftGallary->where('gift_image_type', 'inside'),
                    'outsideImage' => $gift->giftGallary->where('gift_image_type', 'outside'),
                    'planImage' => $gift->giftGallary->where('gift_image_type', 'plan'),
                ];
                $highlightsImages = HighlightImage::where('status', Status::ACTIVE)->where('gift_id' , $gift->id)->get();
            } else {
                $gift = null;
                $giftImages = null;
                $highlightsImages = null;
            }
        } else {
            $gift = null;
            $giftImages = null;
            $highlightsImages = null;
        }

        $houseTour = CMS::where('section_name', Section::TREE_D_HOUSE_TOUR)->first();
        $propertyView = CMS::where('section_name', Section::TREE_D_PROPERTY_VIEW)->first();
        $streetView = CMS::where('section_name', Section::TREE_D_STREET_VIEW)->first();

        return view('frontend.layouts.the-house', compact('hero_section', 'gift', 'giftImages', 'houseTour', 'propertyView', 'streetView','highlightsImages'));
    }

    public function verifyEmail()
    {
        return view('auth.verify_otp');
    }

    public function howItWorks()
    {
        $hero_section = CMS::where('page', Page::HOW_IT_WORKS)->where('section_name', Section::HERO)->where('status', Status::ACTIVE)->first();
        $theProcess = TheProcess::orderBy('sort_id', 'asc')->where('status', Status::ACTIVE)->get();
        $houseTour = CMS::where('section_name', Section::TREE_D_STREET_VIEW)->first();

        return view('frontend.layouts.how-it-works', compact('hero_section', 'theProcess', 'houseTour'));
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

    public function faq()
    {

        $faqs = FAQ::where('status', 'active')->paginate(20);

        return view('frontend.layouts.faqs', compact('faqs'));

    }

    public function checkout(Request $request)
    {
        if ($request->has('campaign_id') && $request->has('cart') && $request->cart == 'true') {
            $campaign = Campaign::where('status', Status::PUBLISHED)->findOrFail($request->campaign_id);
            $cart = 'true';
        } else {
            $campaign = Campaign::where('status', Status::PUBLISHED)->first();
            $cart = 'false';
        }
        if (empty($campaign)) {
            flash()->addWarning('Campaign not found.');

            return redirect()->back();
        }
        $quantity = ! empty($request->quantity) && (int) $request->quantity > 0 ? $request->quantity : 1;

        //check has ticket
        $soldTicket = $campaign->tickets()->count();
        $ticketRemain = $campaign->limit - $soldTicket;
        if ($ticketRemain < $quantity) {
            if ($ticketRemain <= 0) {
                $ticketRemain = '0';
            }
            flash()->addWarning('Only '.$ticketRemain.' Tickets Are Available');

            return redirect()->back();
        }
        $totalPrice = $campaign->price * $quantity;

        return view('frontend.layouts.checkout', compact('campaign', 'quantity', 'totalPrice', 'cart'));
    }

    public function buyEbook()
    {
        $campaign = Campaign::where('status', Status::PUBLISHED)->first();
        $ebookDescription = EbookDescription::where('status', Status::ACTIVE)->first();

        return view('frontend.layouts.buy-ebook', compact('campaign', 'ebookDescription'));
    }

    public function submitContact(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'first-name' => 'required|string|max:255',
            'last-name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric',
            'company-name' => 'nullable|string|max:255',
            'project' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        try {
            // Prepare the data for the email
            $contactData = [
                'first_name' => $request->input('first-name'),
                'last_name' => $request->input('last-name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'company_name' => $request->input('company-name'),
                'project' => $request->input('project'),
                'city' => $request->input('city'),
                'state' => $request->input('state'),
                'country' => $request->input('country'),
                'message' => $request->input('message'),
            ];

            // Send the email
            Mail::to('ebook@ticketvilla.eu')->send(new ContactMail($contactData));

            // Flash success message
            flash()->addSuccess('Your message has been sent successfully!');
        } catch (\Exception $e) {
            // Flash error message
            flash()->addError('Something went wrong: '.$e->getMessage());
        }

        // Redirect
        return redirect()->route('frontend.contact');
    }

    public function add_to_cart(Request $request, $id)
    {

        $validator = \Validator::make($request->all(), [
            'quantity' => 'required|min:1',
        ]);
        if ($validator->fails()) {
            flash()->addError($validator->errors()->first());

            return redirect()->back();
        }
        $campaign = Campaign::findOrFail($id);

        if (empty($campaign)) {
            flash()->addError('Campaign not found.');

            return redirect()->back();
        }

        session()->put('cartData', [
            'id' => $campaign->id,
            'name' => $campaign->name_en,
            'price' => $campaign->price,
            'quantity' => $request->quantity,
            'discount_percent' => $campaign->discount_percent,
            'discount_expire_date' => $campaign->discount_expire_date,
            'how_many_buy' => $campaign->how_many_buy,
            'how_many_free' => $campaign->how_many_free,
            'thumbnail' => $campaign->thumbnail,
        ]);
        flash()->addSuccess('Campaign successfully added to cart.');

        return redirect()->back();
    }

    public function remove_cart()
    {
        if (session()->has('cartData')) {
            session()->forget('cartData');

            flash()->addSuccess('Campaign successfully removed from cart.');

            return redirect()->back();
        } else {
            flash()->addWarning('No campaigns in cart.');

            return redirect()->back();
        }
    }

    public function quantity_change(Request $request)
    {
        $request->validate([
            'quantity' => 'required|min:1',
        ]);

        try {
            if (! session()->has('cartData')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cart is empty.',
                ]);
            }

            $cartData = session('cartData');
            $cartData['quantity'] = $request->quantity;
            session()->put('cartData', $cartData);
            if ($cartData['discount_percent'] && Carbon::parse($cartData['discount_expire_date'])->greaterThan(now())) {
                $discount_price = number_format(($cartData['quantity'] * $cartData['price']) - calculateDiscount(($cartData['quantity'] * $cartData['price']), $cartData['discount_percent']), 2);
            } else {
                $discount_price = 0;
            }

            if (! empty($cartData['how_many_buy']) && ! empty($cartData['how_many_free'])) {
                $free_ticket = calculateFreeTicket($cartData['quantity'], $cartData['how_many_buy'], $cartData['how_many_free']);
            } else {
                $free_ticket = 0;
            }

            return response()->json([
                'success' => 'true',
                'message' => 'Quantity change successfully.',
                'data' => [
                    'total_price' => number_format($cartData['discount_percent'] ? calculateDiscount($cartData['quantity'] * $cartData['price'], $cartData['discount_percent']) : ($cartData['quantity'] * $cartData['price']), 2),
                    'discount_price' => $discount_price,
                    'free_ticket' => $free_ticket,
                    'subtotal' => number_format($cartData['price'] * $cartData['quantity'], 2),
                ],
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage(),
            ]);
        }
    }

    public  function paymentSuccessMessage()
    {
        if (!session()->has('payment_success')) {
            abort(404);
        }

        return view('frontend.layouts.payment_success');
    }
    public  function paymentCancelMessage()
    {
        return view('frontend.layouts.payment_cancel');
    }
}
