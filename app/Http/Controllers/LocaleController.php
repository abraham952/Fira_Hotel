<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    public function switch($locale)
    {
        $supportedLocales = config('localization.supported_locales', ['en', 'am', 'om']);
        
        if (in_array($locale, $supportedLocales)) {
            Session::put('locale', $locale);
            app()->setLocale($locale);
        }
        
        return redirect()->back();
    }
}
