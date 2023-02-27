<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Setting\Setting;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->guest()) {
            return redirect()->route('login');
        }

        return view('home');
    }

    public function profile()
    {
        $settings_array = Setting::pluck('value', 'key')->toArray();

        $data = [];
        $data['setting'] = $settings_array;

        return view('profile', $data);
    }
}
