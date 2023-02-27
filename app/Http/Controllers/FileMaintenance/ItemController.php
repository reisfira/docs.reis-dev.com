<?php

namespace App\Http\Controllers\FileMaintenance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\FileMaintenance\Item;
use App\Actions\FileMaintenance\ItemAction;
use App\Models\ChartOfAccount\GeneralLedger;
use App\Services\FileMaintenance\ItemService;

class ItemController extends Controller
{
    public function datatable(Request $request)
    {
        return ItemService::getDatatable($request);
    }

    public function index()
    {
        return view('file-maintenance.item.index');
    }

    public function create()
    {
        $data = [];
        $data['general_ledgers'] = GeneralLedger::get()->pluck('details', 'full_code')->toArray();

        return view('file-maintenance.item.create', $data);
    }

    public function edit($id)
    {
        $resource = ItemAction::fetchByID($id);

        $data = [];
        $data['resource'] = $resource;
        $data['general_ledgers'] = GeneralLedger::get()->pluck('details', 'full_code')->toArray();

        return view('file-maintenance.item.edit', $data);
    }

    public function store(Request $request)
    {
        $resource = ItemAction::store($request);

        session()->flash('toast-success', "Successfully created Item: {$resource->code} {$resource->description}");
        return redirect()->route('file-maintenance.item.edit', $resource->id);
    }

    public function update(Request $request, $id)
    {
        $resource = ItemAction::update($request, $id);

        session()->flash('toast-success', "Successfully updated Item: {$resource->code} {$resource->description}");
        return redirect()->back();
    }

    public function destroy($id)
    {
        $resource = ItemAction::delete($id);

        session()->flash('toast-success', "Successfully deleted Item: {$resource->code} {$resource->description}");
        return redirect()->route('file-maintenance.item.index');
    }

    public function print(Request $request)
    {
        return ItemAction::print($request);
    }

    public function fetchByCode(Request $request)
    {
        $resource = ItemAction::fetchByCode($request);

        return response()->json($resource);
    }
}
