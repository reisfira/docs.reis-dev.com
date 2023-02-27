@extends('layouts.master')
@section('title', 'Transaction')
@section('subheader', 'Transaction')
@section('breadcrumbs', Breadcrumbs::render(
    'transaction',
    'Receipt Voucher',
    route('transaction.receipt-voucher.index')
))

@section('content')
<div class="sys-params" data-edit-route="{{ route('transaction.receipt-voucher.edit', 'id') }}"></div>
<div class="form-group row">
    <div class="col-2">
        @include('components.form.others.a-btn-create-index', [ 'route' => route('transaction.receipt-voucher.create'), 'permission' => 'Create Invoice' ])
    </div>
    <div class="col-2">
        @include('components.form.others.index-print', [ 'permission' => 'Print Invoice' ])
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-sm table-striped table-bordered" id="resources-datatable" data-route="{{ route('datatable.receipt-voucher') }}">
            <thead class="bg-primary text-white">
                <th width="5%">Doc. No</th>
                <th width="5%">Date</th>
                <th width="5%">Account Code</th>
                <th width="5%">Cheque No/ Ref No</th>
                <th width="5%">Amount</th>
            </thead>
        </table>
    </div>
</div>
@endsection

@push('scripts')
    @include('transaction.receipt-voucher.index-js')
@endpush