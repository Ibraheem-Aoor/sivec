<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class LanguageController extends Controller
{
    public function changeLanguage(Request $request , $locale)
    {
        session()->put('locale', $locale);
        App::setLocale($locale);
        Cache::forget('locale');
        Cache::put('locale' , $locale , 60 * 24 * 30);

        $previousUrlWithoutDomain = parse_url(URL::previous(), PHP_URL_PATH);

        // return $previousUrlWithoutDomain;

        if (Str::contains($previousUrlWithoutDomain, '/ar')) {
            $newUrl = Str::replace('/ar', '', $previousUrlWithoutDomain);
        } else {
            $newUrl = '/ar'.$previousUrlWithoutDomain;
        }
        return redirect($newUrl);
    }
}
