<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Spatie\Permission\Models\Role;
use App\Actions\Setting\RoleAction;
use App\Actions\Setting\PermissionAction;
use App\Services\Setting\RoleService;

class RoleController extends Controller
{
    public function datatable(Request $request)
    {
        return RoleService::getDatatable($request);
    }

    public function index()
    {
        return view('setting.role.index');
    }

    public function create()
    {
        $permissions = PermissionAction::permissions();

        $data = [];
        $data['permissions_all'] = $permissions;
        $data['role_permissions'] = [];

        return view('setting.role.create', $data);
    }

    public function edit($id)
    {
        $resource = RoleAction::fetchByID($id);
        $permissions = PermissionAction::permissions();

        $data = [];
        $data['resource'] = $resource;
        $data['permissions_all'] = $permissions;
        $data['role_permissions'] = $resource->permissions()->pluck('name', 'name')->toArray();

        return view('setting.role.edit', $data);
    }

    public function store(Request $request)
    {
        $resource = RoleAction::store($request);

        session()->flash('toast-success', "Successfully created Role: {$resource->code} {$resource->description}");
        return redirect()->route('setting.role.edit', $resource->id);
    }

    public function update(Request $request, $id)
    {
        $resource = RoleAction::update($request, $id);

        session()->flash('toast-success', "Successfully updated Role: {$resource->code} {$resource->description}");
        return redirect()->back();
    }

    public function destroy($id)
    {
        $resource = RoleAction::delete($id);

        session()->flash('toast-success', "Successfully deleted Role: {$resource->code} {$resource->description}");
        return redirect()->route('setting.role.index');
    }

    public function print(Request $request)
    {
        return RoleAction::print($request);
    }

}
