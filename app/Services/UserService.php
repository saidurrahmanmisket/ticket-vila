<?php

namespace App\Services;

use App\Mail\PasswordSendMail;
use App\Models\User;
use Mail;

class UserService
{
    public function existOrCreateUser($request)
    {
        $user = User::where('email', $request->email)->first();

        if (empty($user)) {
            $password = generatePassword(12);
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'city' => $request->city,
                'email' => $request->email,
                'address_1' => $request->address,
                'zip_code' => $request->zip,
                'country_id' => $request->country_id,
                'password' => bcrypt($password),
            ]);

            // Send login credentials to email
            Mail::to($user->email)->send(new PasswordSendMail($user->first_name.' '.$user->last_name, $user->email, $password));
        }

        return $user;
    }
}
