<?php

namespace App\Http\Controllers\FileMaintenance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\FileMaintenance\IndustrialClassification;
use App\Actions\FileMaintenance\IndustrialClassificationAction;
use App\Services\FileMaintenance\IndustrialClassificationService;

class IndustrialClassificationController extends Controller
{
    public function datatable(Request $request)
    {
        return IndustrialClassificationService::getDatatable($request);
    }

    public function index()
    {
        return view('file-maintenance.industrial-classification.index');
    }

    public function create()
    {
        $data = [];

        return view('file-maintenance.industrial-classification.create', $data);
    }

    public function edit($id)
    {
        $resource = IndustrialClassificationAction::fetchByID($id);

        $data = [];
        $data['resource'] = $resource;

        return view('file-maintenance.industrial-classification.edit', $data);
    }

    public function store(Request $request)
    {
        $resource = IndustrialClassificationAction::store($request);

        session()->flash('toast-success', "Successfully created IndustrialClassification: {$resource->code} {$resource->description}");
        return redirect()->route('file-maintenance.industrial-classification.edit', $resource->id);
    }

    public function update(Request $request, $id)
    {
        $resource = IndustrialClassificationAction::update($request, $id);

        session()->flash('toast-success', "Successfully updated IndustrialClassification: {$resource->code} {$resource->description}");
        return redirect()->back();
    }

    public function destroy($id)
    {
        $resource = IndustrialClassificationAction::delete($id);

        session()->flash('toast-success', "Successfully deleted IndustrialClassification: {$resource->code} {$resource->description}");
        return redirect()->route('file-maintenance.industrial-classification.index');
    }

    public function print(Request $request)
    {
        return IndustrialClassificationAction::print($request);
    }

}
