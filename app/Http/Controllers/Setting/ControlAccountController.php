<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ControlAccountController extends Controller
{
    public function index()
    {
        $data = [];

        return view('setting.control-account.index', $data);
    }


}
