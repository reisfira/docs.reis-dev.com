<?php

namespace App\Http\Controllers\ChartOfAccount;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Actions\ChartOfAccount\ChartOfAccountAction;
use App\Models\ChartOfAccount\ChartOfAccount;
use App\Models\ChartOfAccount\ChartOfAccountSub;
use App\Models\ChartOfAccount\GeneralLedger;
use App\Models\FileMaintenance\CostCentre;

class ChartOfAccountController extends Controller
{
    public function index()
    {
        $data = [];
        $data['chart_of_accounts'] = ChartOfAccount::with('ledgers')
            ->with(['subheadings' => function($subheading) {
                $subheading->with('ledgers');
            }])->get();
        $data['cost_centre'] = CostCentre::pluck('description', 'code');

        return view('chart-of-account.index', $data);
    }

    public function fetch($id)
    {
        $data = ChartOfAccountAction::fetchByID($id);

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $resource = ChartOfAccountAction::store($request);

        session()->flash('toast-success', "Successfully created Chart of Account: {$resource->description}");
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $resource = ChartOfAccountAction::update($request, $id);

        session()->flash('toast-success', "Successfully created Chart of Account: {$resource->description}");
        return redirect()->back();
    }

    public function destroy($id)
    {
        $resource = ChartOfAccountAction::delete($id);

        session()->flash('toast-success', "Successfully delete Chart of Account: {$resource->description}");
        return redirect()->back();
    }

    public function printList(Request $request)
    {
        return ChartOfAccountAction::print($request, 'list');
    }

    public function printFull(Request $request)
    {
        return ChartOfAccountAction::print($request, 'full');
    }
}
