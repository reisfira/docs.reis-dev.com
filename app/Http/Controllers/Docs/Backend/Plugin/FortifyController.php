<?php

namespace App\Http\Controllers\Docs\Backend\Plugin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FortifyController extends Controller
{
    public function outOfTheBox()
    {
        $data = [];
        $data['sample'] = trim(file_get_contents(resource_path('views/components/form/general/select2-w-label.blade.php')));

        return view('frontend.plugin.select2.index', $data);
    }

    public function customization()
    {
        $data = [];
        $data['sample'] = trim(file_get_contents(resource_path('views/components/form/general/select2-w-label.blade.php')));

        return view('frontend.plugin.select2.index', $data);
    }
}
