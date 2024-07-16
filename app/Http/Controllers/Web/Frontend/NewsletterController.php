<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Newsletter\Facades\Newsletter;

class NewsLatterController extends Controller
{
    public function add(Request $request)
    {
        try {
            $validate = \Validator::make($request->all(), [
                'email' => 'required|string|email|max:255',
            ]);
            if ($validate->fails()) {
                flash()->addError($validate->errors()->first());

                return redirect()->back();
            }
            if (! Newsletter::isSubscribed($request->email)) {
                Newsletter::subscribe($request->email);
                flash()->addSuccess('Thanks for subscribing!');

                return redirect()->back();
            }

            flash()->addWarning('You have already subscribed!');

            return redirect()->back();
        } catch (\Exception $exception) {
            flash()->addError('Something went wrong! Please try again later.');

            return back();
        }
    }
}
