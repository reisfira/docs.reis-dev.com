<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\FileMaintenance\Debtor;
use App\Models\FileMaintenance\DocType;
use App\Models\Transaction\Transaction;
use App\Actions\Transaction\TransactionAction;
use App\Services\Transaction\TransactionService;

class TransactionController extends Controller
{
    public function datatable(Request $request)
    {
        return TransactionService::getDatatable($request);
    }

    public function contentDatatable(Request $request)
    {
        return TransactionService::getContentDatatable($request);
    }

    public function index()
    {
        return view('transaction.transaction.index');
    }

    public function create()
    {
        $resource = Transaction::orderBy('id')->first();
        $total_credit = Transaction::filterIsset('doc_no', $resource->doc_no ?? null)->get()->sum('credit');
        $total_debit = Transaction::filterIsset('doc_no', $resource->doc_no ?? null)->get()->sum('debit');
        $doc_type = DocType::pluck('code', 'code');

        $data = [];
        $data['doc_type'] = $doc_type;

        return view('transaction.transaction.edit', $data);
    }

    public function fetchByDocNo(Request $request)
    {
        $data = TransactionAction::fetchByDocNo($request);
        if(!empty($data['transaction'])){$data['transaction']->tax_date = $data['transaction']->tax_date_dmy;}

        return response()->json($data);
    }

    public function edit($id)
    {
        $resource = Transaction::find($id);
        $total_credit = Transaction::where('doc_no', $resource->doc_no)->get()->sum('credit');
        $total_debit = Transaction::where('doc_no', $resource->doc_no)->get()->sum('debit');
        $doc_type = DocType::pluck('code', 'code');

        $data = [];
        $data['resource'] = $resource;
        $data['total_credit'] = $total_credit;
        $data['total_debit'] = $total_debit;
        $data['difference'] = $total_debit - $total_credit;
        $data['doc_type'] = $doc_type;

        return view('transaction.transaction.edit', $data);
    }

    public function destroy($id)
    {
        $resource = TransactionAction::delete($id);

        session()->flash('toast-success', "Successfully delete Transaction: {$resource->doc_no}");
        return redirect()->route('transaction.transaction.index');
    }

    public function saveContent(Request $request)
    {
        $resource = TransactionAction::saveContent($request);
        $data = [];
        $data['resource'] = $resource;

        return response()->json($data);
    }

    public function deleteContent(Request $request)
    {
        $resource = TransactionAction::deleteContent($request);
        $data = [];
        $data['resource'] = $resource;

        return response()->json($data);
    }
}
