<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BillingSetupController extends Controller
{
    public function index()
    {
        $data = [];

        return view('setting.billing-setup.index', $data);
    }


}
