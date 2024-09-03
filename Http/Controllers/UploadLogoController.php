<?php

namespace Modules\WhiteLabel\Http\Controllers;

use Crater\Models\CompanySetting;
use Crater\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UploadLogoController extends Controller
{
    public function uploadLogos(Request $request)
    {
        $adminPortalLogoUrl = null;
        $customerPortalLogoUrl = null;
        $loginPageLogoUrl = null;

        if ($request->hasFile('customer_portal_logo')) {
            $imageName = time().'.'.$request->customer_portal_logo->extension();
            $request->customer_portal_logo->storeAs('public/whitelabel/customer_portal_logo/', $imageName);

            $customerPortalLogoUrl = 'whitelabel/customer_portal_logo/'.$imageName;

            $settings = [
                'customer_portal_logo' => $customerPortalLogoUrl
            ];

            CompanySetting::setSettings($settings, $request->header('company'));
        }

        if ($request->hasFile('admin_portal_logo')) {
            $imageName = time().'.'.$request->admin_portal_logo->extension();
            $request->admin_portal_logo->storeAs('public/whitelabel/admin_portal_logo/', $imageName);

            $adminPortalLogoUrl = 'whitelabel/admin_portal_logo/'.$imageName;

            Setting::setSetting('admin_portal_logo', $adminPortalLogoUrl);
        }

        if ($request->hasFile('login_page_logo')) {
            $imageName = time().'.'.$request->login_page_logo->extension();
            $request->login_page_logo->storeAs('public/whitelabel/login_page_logo/', $imageName);

            $loginPageLogoUrl = 'whitelabel/login_page_logo/'.$imageName;

            Setting::setSetting('login_page_logo', $loginPageLogoUrl);
        }

        return response()->json([
            'success' => true,
            'customerPortalLogoUrl' => $customerPortalLogoUrl,
            'adminPortalLogoUrl' => $adminPortalLogoUrl,
            'loginPageLogoUrl' => $loginPageLogoUrl
        ], 200);
    }
}
