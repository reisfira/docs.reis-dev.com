<?php

namespace App\Actions\FileMaintenance;

use Illuminate\Http\Request;
use App\Models\FileMaintenance\Item;
use App\Models\Setting\Setting;
use App\Services\Utility\JasperService;

class ItemAction
{
    public static function fetchByID($id)
    {
        return Item::find($id);
    }

    public static function fetchByCode($request)
    {
        return Item::where('code', $request['item_code'])->first();
    }

    public static function store($request)
    {
        $softdeleted = Item::onlyTrashed()->where('code', $request['code'])->forceDelete();
        $request->validate([
            'code' => ['required', 'unique:item,code'],
            'description' => ['required'],
            'uom' => ['required'],
            'cost' => ['required'],
            'price' => ['required'],
        ]);

        $request_data = Item::requestData($request);
        $resource = Item::create($request_data);

        return $resource;
    }

    public static function update($request, $id)
    {
        $request->validate([
            'code' => ['required', "unique:item,code,{$id}"],
            'description' => ['required'],
            'uom' => ['required'],
            'cost' => ['required'],
            'price' => ['required'],
        ]);

        $request_data = Item::requestData($request);
        $resource = Item::findOrFail($id);
        $resource->update($request_data);

        return $resource;
    }

    public static function delete($id)
    {
        $resource = Item::find($id);
        // $resource->stocks->delete();
        // $resource->general_ledgers->delete();
        // $resource->debtors->delete();
        // $resource->creditors->delete();
        $resource->delete();

        return $resource;
    }

    public static function print($request)
    {
        $resources = Item::get();
        $datasource = JasperService::json('item', $resources);
        $jrxml = public_path('jasper/file-maintenance/code-description.jrxml');
        $output_filename = 'item-report';

        if ($request['print_type'] == 'json')
            return response()->download($datasource);

        $params = Setting::getJasperParams('Item Master List');

        return JasperService::generate($request['print_type'], $datasource, $jrxml, $output_filename, $params);
    }
}