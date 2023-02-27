<?php

namespace App\Http\Controllers\FileMaintenance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\FileMaintenance\DocType;
use App\Actions\FileMaintenance\DocTypeAction;
use App\Services\FileMaintenance\DocTypeService;

class DocTypeController extends Controller
{
    public function datatable(Request $request)
    {
        return DocTypeService::getDatatable($request);
    }

    public function index()
    {
        return view('file-maintenance.doc-type.index');
    }

    public function create()
    {
        $data = [];

        return view('file-maintenance.doc-type.create', $data);
    }

    public function edit($id)
    {
        $resource = DocTypeAction::fetchByID($id);

        $data = [];
        $data['resource'] = $resource;

        return view('file-maintenance.doc-type.edit', $data);
    }

    public function store(Request $request)
    {
        $resource = DocTypeAction::store($request);

        session()->flash('toast-success', "Successfully created Doc Type: {$resource->code} {$resource->description}");
        return redirect()->route('file-maintenance.doc-type.edit', $resource->id);
    }

    public function update(Request $request, $id)
    {
        $resource = DocTypeAction::update($request, $id);

        session()->flash('toast-success', "Successfully updated Doc Type: {$resource->code} {$resource->description}");
        return redirect()->back();
    }

    public function destroy($id)
    {
        $resource = DocTypeAction::delete($id);

        session()->flash('toast-success', "Successfully deleted Doc Type: {$resource->code} {$resource->description}");
        return redirect()->route('file-maintenance.doc-type.index');
    }

    public function print(Request $request)
    {
        return DocTypeAction::print($request);
    }
}
