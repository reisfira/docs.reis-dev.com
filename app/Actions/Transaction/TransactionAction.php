<?php

namespace App\Actions\Transaction;

use Illuminate\Http\Request;
use App\Models\Transaction\Transaction;
use App\Models\FileMaintenance\Item;

class TransactionAction
{
    public static function fetchByDocNo($request)
    {
        $transaction = Transaction::where('doc_no', $request['doc_no'])->first();
        $total_credit = Transaction::where('doc_no', $request['doc_no'])->get()->sum('credit');
        $total_debit = Transaction::where('doc_no', $request['doc_no'])->get()->sum('debit');
        $difference = $total_debit - $total_credit;
        
        $data = [];
        $data['transaction'] = $transaction;
        $data['total_credit'] = $total_credit;
        $data['total_debit'] = $total_debit;
        $data['difference'] = $difference;
        return $data;
    }

    public static function store($request)
    {
        $request->validate([
            'account_code' => [ 'required' ],
            'doc_no' => [ 'required' ],
            'reference_no' => [ 'required' ],
        ]);

        $request_data = Transaction::requestData($request);
        $resource = Transaction::create($request_data);

        return $resource;
    }

    public static function update($request, $id)
    {
        $request->validate([
            'account_code' => [ 'required' ],
            'doc_no' => [ 'required' ],
            'reference_no' => [ 'required' ],
        ]);

        $request_data = Transaction::requestData($request);
        $resource = Transaction::find($id);
        $resource->update($request_data);

        return $resource;
    }

    public static function delete($id)
    {
        $resource = Transaction::find($id);
        $resource->delete();

        return $resource;
    }

    public static function saveContent($request)
    {
        $request->validate([
            'account_code' => [ 'required' ],
            'doc_no' => [ 'required' ],
            'reference_no' => [ 'required' ],
        ]);

        $transaction = Transaction::fillData($request);
        $total_credit = Transaction::where('doc_no', $request['doc_no'])->get()->sum('credit');
        $total_debit = Transaction::where('doc_no', $request['doc_no'])->get()->sum('debit');
        
        $data = [];
        $data['transaction'] = $transaction;
        $data['total_credit'] = $total_credit;
        $data['total_debit'] = $total_debit;
        $data['difference'] = $total_debit - $total_credit;

        return $data;
    }

    public static function deleteContent($request)
    {
        $request->validate([
            'id' => [ 'required' ],
        ]);

        $transaction = Transaction::find($request['id']);
        $transaction->delete();

        $total_credit = Transaction::where('doc_no', $request['doc_no'])->get()->sum('credit');
        $total_debit = Transaction::where('doc_no', $request['doc_no'])->get()->sum('debit');

        $data = [];
        $data['total_credit'] = $total_credit;
        $data['total_debit'] = $total_debit;
        $data['difference'] = $total_debit - $total_credit;

        return $data;
    }
}