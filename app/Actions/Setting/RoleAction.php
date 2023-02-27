<?php

namespace App\Actions\Setting;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\Setting\Setting;
use App\Services\Utility\JasperService;

class RoleAction
{
    public static function fetchByID($id)
    {
        return Role::find($id);
    }

    public static function store($request)
    {
        // $softdeleted = Role::onlyTrashed()->where('code', $request['code'])->forceDelete();
        $request->validate([ 'name' => ['required', 'unique:roles,name'], ]);

        $request_data = [ 'name' => $request['name'], 'guard_name' => 'web', ];
        $resource = Role::create($request_data);

        if (!empty($request['permission'])) {
            $resource->syncPermissions($request['permission']);
        }

        return $resource;
    }

    public static function update($request, $id)
    {
        $request->validate([ 'name' => ['required', "unique:roles,name,{$id}"] ]);
        $request_data = [ 'name' => $request['name'], 'guard_name' => 'web', ];

        $resource = Role::findOrFail($id);
        $resource->update($request_data);
        $resource->syncPermissions(isset($request['permission']) && !empty($request['permission']) ? $request['permission'] : []);

        return $resource;
    }

    public static function delete($id)
    {
        $resource = Role::find($id);
        $resource->delete();

        return $resource;
    }

    public static function print($request)
    {
        $resources = Role::get();
        $datasource = JasperService::json('role', $resources);
        $jrxml = public_path('jasper/file-maintenance/code-description.jrxml');
        $output_filename = 'role-report';

        if ($request['print_type'] == 'json')
            return response()->download($datasource);

        $params = Setting::getJasperParams('Role Master List');

        return JasperService::generate($request['print_type'], $datasource, $jrxml, $output_filename, $params);
    }
}