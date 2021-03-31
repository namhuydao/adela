<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        return view('site.contact', compact('settings'));
    }
}
