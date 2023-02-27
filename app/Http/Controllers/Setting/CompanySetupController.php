<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting\Setting;
use Illuminate\Http\Request;

class CompanySetupController extends Controller
{
    public function view()
    {
        $settings_array = Setting::pluck('value', 'key')->toArray();

        $data = [];
        $data['setting'] = $settings_array;

        return view('setting.company-setup.index', $data);
    }

    public function save(Request $request)
    {
        $settings = Setting::whereIn('key', array_keys($request['setting']))->get()->keyBy('key');
        foreach ($request['setting'] as $key => $value) {
            if (isset($settings[$key])) {
                $settings[$key]->update([ 'value' => $value ]);
            }
            $setting = Setting::updateOrCreate([ 'key' => $key ], [ 'value' => $value ]);
        }

        session()->flash('toast-success', 'Setting update successful');
        return redirect()->back();
    }
}
