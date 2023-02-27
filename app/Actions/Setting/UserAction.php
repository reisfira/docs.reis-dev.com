<?php

namespace App\Actions\Setting;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Setting\Setting;
use App\Services\Utility\JasperService;

class UserAction
{
    public static function fetchByID($id)
    {
        return User::find($id);
    }

    public static function store($request)
    {
        // $softdeleted = User::onlyTrashed()->where('code', $request['code'])->forceDelete();
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:users,email'],
            'password' => ['required'],
            'role' => ['required'],
        ]);

        $request_data = User::requestData($request);
        $resource = User::create($request_data);
        $resource->syncRoles([ $request['role'] ]);

        return $resource;
    }

    public static function update($request, $id)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', "unique:users,email,{$id}"],
            'role' => ['required']
        ]);
        $request_data = User::requestData($request);

        $resource = User::findOrFail($id);
        $resource->update($request_data);
        $resource->syncRoles([ $request['role'] ]);

        return $resource;
    }

    public static function delete($id)
    {
        $resource = User::find($id);
        // $resource->stocks->delete();
        // $resource->general_ledgers->delete();
        // $resource->debtors->delete();
        // $resource->creditors->delete();
        $resource->delete();

        return $resource;
    }

    public static function print($request)
    {
        $resources = User::get();
        $datasource = JasperService::json('user', $resources);
        $jrxml = public_path('jasper/file-maintenance/code-description.jrxml');
        $output_filename = 'user-report';

        if ($request['print_type'] == 'json')
            return response()->download($datasource);

        $params = Setting::getJasperParams('User Master List');

        return JasperService::generate($request['print_type'], $datasource, $jrxml, $output_filename, $params);
    }
}