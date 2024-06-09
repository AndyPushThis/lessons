<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function setLocale()
    {
        app()->setLocale(request()->lang);
        session()->put('lang', request()->lang);
        return back();
    }
}
