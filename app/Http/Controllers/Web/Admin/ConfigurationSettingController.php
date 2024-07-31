<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Rules\HasSpaceToAddComma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ConfigurationSettingController extends Controller
{
    public function index()
    {
        //permission check
        if (! has_permission('configuration settings')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }

        return view('admin.layouts.configuration-setting.index');
    }

    public function mailSettingUpdate(Request $request)
    {
        //permission check
        if (! has_permission('configuration settings')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $request->validate([
            'mail_mailer' => 'required|string',
            'mail_host' => 'required|string',
            'mail_port' => 'required|string',
            'mail_username' => 'nullable|string',
            'mail_password' => 'nullable|string',
            'mail_encryption' => 'nullable|string',
            'mail_from_address' => 'required|string',
        ]);
        try {
            $envContent = File::get(base_path('.env'));
            $lineBreak = "\n";
            $envContent = preg_replace([
                '/MAIL_MAILER=(.*)\s/',
                '/MAIL_HOST=(.*)\s/',
                '/MAIL_PORT=(.*)\s/',
                '/MAIL_USERNAME=(.*)\s/',
                '/MAIL_PASSWORD=(.*)\s/',
                '/MAIL_ENCRYPTION=(.*)\s/',
                '/MAIL_FROM_ADDRESS=(.*)\s/',
            ], [
                'MAIL_MAILER='.$request->mail_mailer.$lineBreak,
                'MAIL_HOST='.$request->mail_host.$lineBreak,
                'MAIL_PORT='.$request->mail_port.$lineBreak,
                'MAIL_USERNAME='.$request->mail_username.$lineBreak,
                'MAIL_PASSWORD='.'"'.$request->mail_password.'"'.$lineBreak,
                'MAIL_ENCRYPTION='.$request->mail_encryption.$lineBreak,
                'MAIL_FROM_ADDRESS='.'"'.$request->mail_from_address.'"'.$lineBreak,
            ], $envContent);

            if ($envContent !== null) {
                File::put(base_path('.env'), $envContent);
            }

            return back()->with('success', 'Updated successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update'.$e->getMessage());
        }
    }

    public function paymentConfigurationUpdate(Request $request)
    {
        //permission check
        if (! has_permission('configuration settings')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $request->validate([
            'STRIPE_PK' => ['required', 'string', new HasSpaceToAddComma()],
            'STRIPE_SK' => ['required', 'string', new HasSpaceToAddComma()],
            'payment_mode' => ['required', 'in:sandbox,live', new HasSpaceToAddComma()],
            'paypal_sandbox_client_id' => ['required_if:payment_mode,sandbox', 'string', 'nullable', new HasSpaceToAddComma()],
            'paypal_sandbox_client_secret' => ['required_if:payment_mode,sandbox', 'nullable', 'string', new HasSpaceToAddComma()],
            'paypal_live_app_id' => ['required_if:payment_mode,live', 'string', 'nullable', new HasSpaceToAddComma()],
            'paypal_live_client_id' => ['required_if:payment_mode,live', 'string', 'nullable', new HasSpaceToAddComma()],
            'paypal_live_client_secret' => ['required_if:payment_mode,live', 'string', 'nullable', new HasSpaceToAddComma()],
        ]);
        try {
            $envContent = File::get(base_path('.env'));
            $lineBreak = "\n";
            $envContent = preg_replace([
                '/STRIPE_PK=(.*)\s/',
                '/STRIPE_SK=(.*)\s/',
                '/PAYPAL_MODE=(.*)\s/',
                '/PAYPAL_SANDBOX_CLIENT_ID=(.*)\s/',
                '/PAYPAL_SANDBOX_CLIENT_SECRET=(.*)\s/',
                '/PAYPAL_LIVE_APP_ID=(.*)\s/',
                '/PAYPAL_LIVE_CLIENT_ID=(.*)\s/',
                '/PAYPAL_LIVE_CLIENT_SECRET=(.*)\s/',
            ], [
                'STRIPE_PK='.$request->STRIPE_PK.$lineBreak,
                'STRIPE_SK='.$request->STRIPE_SK.$lineBreak,
                'PAYPAL_MODE='.$request->payment_mode.$lineBreak,
                'PAYPAL_SANDBOX_CLIENT_ID='.$request->paypal_sandbox_client_id.$lineBreak,
                'PAYPAL_SANDBOX_CLIENT_SECRET='.$request->paypal_sandbox_client_secret.$lineBreak,
                'PAYPAL_LIVE_APP_ID='.$request->paypal_live_app_id.$lineBreak,
                'PAYPAL_LIVE_CLIENT_ID='.$request->paypal_live_client_id.$lineBreak,
                'PAYPAL_LIVE_CLIENT_SECRET='.$request->paypal_live_client_secret.$lineBreak,
            ], $envContent);

            if ($envContent !== null) {
                File::put(base_path('.env'), $envContent);
            }

            return back()->with('success', 'Updated successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update'.$e->getMessage());
        }
    }

    public function googleLoginConfig(Request $request)
    {
        //permission check
        if (! has_permission('configuration settings')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $request->validate([
            'google_client_id' => ['required', 'string', new HasSpaceToAddComma()],
            'google_client_secret' => ['required', 'string', new HasSpaceToAddComma()],
            'google_call_back_url' => ['required', 'url', new HasSpaceToAddComma()],
        ]);
        try {
            $envContent = File::get(base_path('.env'));
            $lineBreak = "\n";
            $envContent = preg_replace([
                '/GOOGLE_CLIENT_ID=(.*)\s/',
                '/GOOGLE_CLIENT_SECRET=(.*)\s/',
                '/GOOGLE_CALL_BACK_URL=(.*)\s/',
            ], [
                'GOOGLE_CLIENT_ID='.$request->google_client_id.$lineBreak,
                'GOOGLE_CLIENT_SECRET='.$request->google_client_secret.$lineBreak,
                'GOOGLE_CALL_BACK_URL='.$request->google_call_back_url.$lineBreak,
            ], $envContent);

            if ($envContent !== null) {
                File::put(base_path('.env'), $envContent);
            }

            return back()->with('success', 'Updated successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update'.$e->getMessage());
        }
    }

    public function mailchimpConfig(Request $request)
    {
        //permission check
        if (! has_permission('configuration settings')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $request->validate([
            'news_latter_api_key' => ['required', 'string', new HasSpaceToAddComma()],
            'news_latter_list_id' => ['required', 'string', new HasSpaceToAddComma()],
        ]);
        try {
            $envContent = File::get(base_path('.env'));
            $lineBreak = "\n";
            $envContent = preg_replace([
                '/NEWSLETTER_API_KEY=(.*)\s/',
                '/NEWSLETTER_LIST_ID=(.*)\s/',
            ], [
                'NEWSLETTER_API_KEY='.$request->news_latter_api_key.$lineBreak,
                'NEWSLETTER_LIST_ID='.$request->news_latter_list_id.$lineBreak,
            ], $envContent);

            if ($envContent !== null) {
                File::put(base_path('.env'), $envContent);
            }

            return back()->with('success', 'Updated successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update'.$e->getMessage());
        }
    }
}
