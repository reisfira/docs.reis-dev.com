<?php

namespace App\Http\Controllers\Docs\Frontend\Plugin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Select2Controller extends Controller
{
    public function index()
    {
        $data = [];
        $data['sample'] = trim(file_get_contents(resource_path('views/components/form/general/select2-w-label.blade.php')));

        return view('frontend.plugin.select2.index', $data);
    }
}
