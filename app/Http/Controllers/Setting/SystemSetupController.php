<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SystemSetupController extends Controller
{
    public function index()
    {
        $data = [];

        return view('setting.system-setup.index', $data);
    }


}
