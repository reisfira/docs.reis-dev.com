<?php

namespace App\Http\Controllers\Docs\Backend\SelfDefined;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HelperController extends Controller
{
    public function index()
    {
        $data = [];
        $data['datatable'] = trim(file_get_contents(app_path('Helpers/datatable.php')));

        return view('backend.self-defined.helper.index', $data);
    }
}
