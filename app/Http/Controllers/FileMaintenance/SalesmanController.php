<?php

namespace App\Http\Controllers\FileMaintenance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\FileMaintenance\Salesman;
use App\Actions\FileMaintenance\SalesmanAction;
use App\Services\FileMaintenance\SalesmanService;

class SalesmanController extends Controller
{
    public function datatable(Request $request)
    {
        return SalesmanService::getDatatable($request);
    }

    public function index()
    {
        return view('file-maintenance.salesman.index');
    }

    public function create()
    {
        $data = [];

        return view('file-maintenance.salesman.create', $data);
    }

    public function edit($id)
    {
        $resource = SalesmanAction::fetchByID($id);

        $data = [];
        $data['resource'] = $resource;

        return view('file-maintenance.salesman.edit', $data);
    }

    public function store(Request $request)
    {
        $resource = SalesmanAction::store($request);

        session()->flash('toast-success', "Successfully created Salesman: {$resource->code} {$resource->description}");
        return redirect()->route('file-maintenance.salesman.edit', $resource->id);
    }

    public function update(Request $request, $id)
    {
        $resource = SalesmanAction::update($request, $id);

        session()->flash('toast-success', "Successfully updated Salesman: {$resource->code} {$resource->description}");
        return redirect()->back();
    }

    public function destroy($id)
    {
        $resource = SalesmanAction::delete($id);

        session()->flash('toast-success', "Successfully deleted Salesman: {$resource->code} {$resource->description}");
        return redirect()->route('file-maintenance.salesman.index');
    }

    public function print(Request $request)
    {
        return SalesmanAction::print($request);
    }

}
