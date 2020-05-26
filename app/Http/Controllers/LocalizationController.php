<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocalizationController extends Controller
{
    public function setLocale(string $lang)
    {
        session(['locale' => $lang]);
        App::setLocale($lang);
        $currentLang = $lang == "en" ? "English" : "Arabic";
        return redirect()->back()->with('success', "System's language changed to " . $currentLang);
    }
}
