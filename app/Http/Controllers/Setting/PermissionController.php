<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Actions\Setting\PermissionAction;

class PermissionController extends Controller
{
    public function regenerate(Request $request)
    {
        PermissionAction::regenerate();

        session()->flash('toast-success', 'System successfully regenerate permissions');
        return redirect()->back();
    }
}
