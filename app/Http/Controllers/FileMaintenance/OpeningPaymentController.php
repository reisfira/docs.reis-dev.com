<?php

namespace App\Http\Controllers\FileMaintenance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\FileMaintenance\Debtor;
use App\Models\FileMaintenance\OpeningPayment;
use App\Actions\FileMaintenance\OpeningPaymentAction;
use App\Services\FileMaintenance\OpeningPaymentService;

class OpeningPaymentController extends Controller
{
    public function datatable(Request $request)
    {
        return OpeningPaymentService::getDatatable($request);
    }

    public function index()
    {
        return view('file-maintenance.dbcr.opening-payment.index');
    }

    public function create()
    {
        $data = [];

        return view('file-maintenance.dbcr.opening-payment.create', $data);
    }

    public function fetch($id)
    {
        $data = OpeningPaymentAction::fetchByID($id);

        return response()->json($data);
    }

    public function edit($id)
    {
        $resource = OpeningPayment::find($id);

        $data = [];
        $data['resource'] = $resource;
        $data['set_account_code'] = $resource->account_code;

        return view('file-maintenance.dbcr.opening-payment.edit', $data);
    }

    public function store(Request $request)
    {
        $resource = OpeningPaymentAction::store($request);

        session()->flash('toast-success', "Successfully created Opening Payment: {$resource->doc_no}");
        return redirect()->route('file-maintenance.opening-payment.edit', $resource->id);
    }

    public function update(Request $request, $id)
    {
        $resource = OpeningPaymentAction::update($request, $id);

        session()->flash('toast-success', "Successfully created Opening Payment: {$resource->doc_no}");
        return redirect()->back();
    }

    public function destroy($id)
    {
        $resource = OpeningPaymentAction::delete($id);

        session()->flash('toast-success', "Successfully delete Opening Payment: {$resource->doc_no}");
        return redirect()->back();
    }

    public function print(Request $request)
    {
        return OpeningPaymentAction::print($request);
    }

    public function fetchInfo(Request $request)
    {
        $dbcr = Debtor::findByAccountCode($request['account_code']);
        $is_debtor = true;
        $next_doc = '';

        if ($dbcr) {
            $next_doc = OpeningPayment::generateDoc($request['account_code']);
        }

        if (!$dbcr) {
            $dbcr = Creditor::findByAccountCode($request['account_code']);

            if ($dbcr) {
                $is_debtor = false;
                $next_doc = OpeningPayment::generateDoc($request['account_code']);
            }
        }

        $data = [];
        $data['dbcr'] = $dbcr;
        $data['is_debtor'] = $is_debtor;
        $data['next_doc'] = $next_doc;

        return response()->json($data);
    }

}
