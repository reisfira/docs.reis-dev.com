<?php

namespace App\Http\Controllers\FileMaintenance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\FileMaintenance\Area;
use App\Actions\FileMaintenance\AreaAction;
use App\Services\FileMaintenance\AreaService;

class AreaController extends Controller
{
    public function datatable(Request $request)
    {
        return AreaService::getDatatable($request);
    }

    public function index()
    {
        return view('file-maintenance.area.index');
    }

    public function create()
    {
        $data = [];

        return view('file-maintenance.area.create', $data);
    }

    public function edit($id)
    {
        $resource = AreaAction::fetchByID($id);

        $data = [];
        $data['resource'] = $resource;

        return view('file-maintenance.area.edit', $data);
    }

    public function store(Request $request)
    {
        $resource = AreaAction::store($request);

        session()->flash('toast-success', "Successfully created Area: {$resource->code} {$resource->description}");
        return redirect()->route('file-maintenance.area.edit', $resource->id);
    }

    public function update(Request $request, $id)
    {
        $resource = AreaAction::update($request, $id);

        session()->flash('toast-success', "Successfully updated Area: {$resource->code} {$resource->description}");
        return redirect()->back();
    }

    public function destroy($id)
    {
        $resource = AreaAction::delete($id);

        session()->flash('toast-success', "Successfully deleted Area: {$resource->code} {$resource->description}");
        return redirect()->route('file-maintenance.area.index');
    }

    public function print(Request $request)
    {
        return AreaAction::print($request);
    }

}
