<?php

namespace App\Http\Controllers\Web\User;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Country;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class SettingsController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        $campaign = Campaign::withCount('tickets')->latest()->where('status', 'published')->first();
        $userOrder = Order::with('campaign:id,name_en,thumbnail,price')->where('campaign_id', $campaign->id)
            ->where('user_id', $user->id)
            ->where('payment_status', 'completed')
            ->get();

        if (! $userOrder) {
            $userOrder = null;
        }

        $countries = Country::all();

        $isoCode = $location = geoip(request()->ip())->iso_code;

        return view('user.layouts.settings', compact('userOrder', 'countries', 'isoCode'));
    }

    public function infoUpdate(Request $request)
    {
        $request['phone'] = '+'.$request['phone_code'].$request['phone'];
        $input = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'zip_code' => 'required|string|max:20|min:4',
            'gender' => 'required|in:male,female,others',
            'address_1' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'city_of_birthday' => 'required|string|max:100',
            'country_id' => 'required|exists:countries,id',
            'country_of_birthday' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'birthday' => 'required|date',
            'phone' => 'required|phone|max:25',
        ],
            [
                'avatar.max' => 'Max file size 2 MB',
                'phone.phone' => 'Please enter a valid phone number.',
            ]);

        //        dd($request->all());
        try {

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
                'zip_code' => $request->zip_code,
                'gender' => $request->gender,
                'address_1' => $request->address_1,
                'city_of_birthday' => $request->city_of_birthday,
                'country_of_birthday' => $request->country_of_birthday,
                'birthday' => $request->birthday,
                'phone' => $request->phone,
                'city' => $request->city,
                'state' => $request->state,
                'country_id' => $request->country_id,
                'avatar' => $avatar,
            ]);

            //Success message
            flash()->addSuccess('Your profile successfully updated.');

            return redirect()->route('user.settings');
        } catch (\Exception $e) {
            // Handle the exception
            Log::error($e->getMessage());

            return redirect()->route('user.settings')->with('error', $e->getMessage());
        }
    }

    //PASSWORD CHANGE
    public function passwordUpdate(Request $request)
    {
        try {
            $request->validate([
                'current_password' => 'required|string|min:6',
                'password' => 'required|string|min:6|confirmed',
                'password_confirmation' => 'required|string|min:6',
            ]);
            $user = Auth::user();

            if (! Hash::check($request->current_password, $user->password)) {
                flash()->addError('Your current password is incorrect');

                return redirect()->route('user.settings');
            }
            $user->update([
                'password' => bcrypt($request->password),
            ]);

            flash()->addSuccess('Your password successfully updated.');

            return redirect()->route('admin.profile.index');
        } catch (\Exception $e) {
            // Handle the exception
            Log::error($e->getMessage());

            return redirect()->route('user.settings')->with('error', $e->getMessage());
        }
    }
}
