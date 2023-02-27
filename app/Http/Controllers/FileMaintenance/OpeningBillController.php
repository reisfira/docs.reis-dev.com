<?php

namespace App\Http\Controllers\FileMaintenance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\FileMaintenance\Debtor;
use App\Models\FileMaintenance\OpeningBill;
use App\Actions\FileMaintenance\OpeningBillAction;
use App\Models\FileMaintenance\Creditor;
use App\Services\FileMaintenance\OpeningBillService;

class OpeningBillController extends Controller
{
    public function datatable(Request $request)
    {
        return OpeningBillService::getDatatable($request);
    }

    public function index()
    {
        return view('file-maintenance.dbcr.opening-bill.index');
    }

    public function create()
    {
        $data = [];

        return view('file-maintenance.dbcr.opening-bill.create', $data);
    }

    public function fetch($id)
    {
        $data = OpeningBillAction::fetchByID($id);

        return response()->json($data);
    }

    public function edit($id)
    {
        $resource = OpeningBill::find($id);

        $data = [];
        $data['resource'] = $resource;
        $data['set_account_code'] = $resource->account_code;

        return view('file-maintenance.dbcr.opening-bill.edit', $data);
    }

    public function store(Request $request)
    {
        $resource = OpeningBillAction::store($request);

        session()->flash('toast-success', "Successfully created Opening Bill: {$resource->doc_no}");
        return redirect()->route('file-maintenance.opening-bill.edit', $resource->id);
    }

    public function update(Request $request, $id)
    {
        $resource = OpeningBillAction::update($request, $id);

        session()->flash('toast-success', "Successfully created Opening Bill: {$resource->doc_no}");
        return redirect()->back();
    }

    public function destroy($id)
    {
        $resource = OpeningBillAction::delete($id);

        session()->flash('toast-success', "Successfully delete Opening Bill: {$resource->doc_no}");
        return redirect()->back();
    }

    public function print(Request $request)
    {
        return OpeningBillAction::print($request);
    }

    public function fetchInfo(Request $request)
    {
        $dbcr = Debtor::findByAccountCode($request['account_code']);
        $is_debtor = true;
        $next_doc = '';

        if ($dbcr) {
            $next_doc = OpeningBill::generateDoc($request['account_code']);
        }

        if (!$dbcr) {
            $dbcr = Creditor::findByAccountCode($request['account_code']);

            if ($dbcr) {
                $is_debtor = false;
                $next_doc = OpeningBill::generateDoc($request['account_code']);
            }
        }

        $data = [];
        $data['dbcr'] = $dbcr;
        $data['is_debtor'] = $is_debtor;
        $data['next_doc'] = $next_doc;

        return response()->json($data);
    }
}
