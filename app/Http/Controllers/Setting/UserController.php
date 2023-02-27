<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Setting\User;
use App\Actions\Setting\UserAction;
use App\Services\Setting\UserService;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function datatable(Request $request)
    {
        return UserService::getDatatable($request);
    }

    public function index()
    {
        return view('setting.user.index');
    }

    public function create()
    {
        $user_groups = Role::pluck('name', 'name')->toArray();

        $data = [];
        $data['user_groups'] = $user_groups;

        return view('setting.user.create', $data);
    }

    public function edit($id)
    {
        $resource = UserAction::fetchByID($id);
        $user_groups = Role::pluck('name', 'name')->toArray();

        $data = [];
        $data['resource'] = $resource;
        $data['user_groups'] = $user_groups;

        return view('setting.user.edit', $data);
    }

    public function store(Request $request)
    {
        $resource = UserAction::store($request);

        session()->flash('toast-success', "Successfully created User: {$resource->code} {$resource->description}");
        return redirect()->route('setting.user.edit', $resource->id);
    }

    public function update(Request $request, $id)
    {
        $resource = UserAction::update($request, $id);

        session()->flash('toast-success', "Successfully updated User: {$resource->code} {$resource->description}");
        return redirect()->back();
    }

    public function destroy($id)
    {
        $resource = UserAction::delete($id);

        session()->flash('toast-success', "Successfully deleted User: {$resource->code} {$resource->description}");
        return redirect()->route('setting.user.index');
    }

    public function print(Request $request)
    {
        return UserAction::print($request);
    }

}
