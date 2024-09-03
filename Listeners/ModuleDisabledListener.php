<?php

namespace Modules\WhiteLabel\Listeners;

use Crater\Events\ModuleDisabledEvent;
use Crater\Models\Company;
use Crater\Models\Setting;

class ModuleDisabledListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param ModuleDisabledEvent $event
     * @return void
     */
    public function handle(ModuleDisabledEvent $event)
    {
        if ($event->module->name !== config('whitelabel.name')) {
            return false;
        }

        $companies = Company::all();

        $companies->map(function ($company) {
            $company->settings()->whereIn('option', ['customer_portal_logo', 'customer_portal_logo'])->delete();
            Setting::where('option', 'admin_portal_theme')->delete();
        });
    }
}
