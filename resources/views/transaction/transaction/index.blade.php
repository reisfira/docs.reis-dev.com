@extends('layouts.master')
@section('title', 'Transaction')
@section('subheader', 'Transaction')
@section('breadcrumbs', Breadcrumbs::render(
    'transaction',
    'Transaction',
    route('transaction.transaction.index')
))

@section('content')
<div class="sys-params" data-edit-route="{{ route('transaction.transaction.edit', 'id') }}"></div>
<div class="form-group row">
    <div class="col-2">
        @include('components.form.others.a-btn-create-index', [ 'route' => route('transaction.transaction.create'), 'permission' => 'Create Invoice' ])
    </div>
    <div class="col-2">
        @include('components.form.others.index-print', [ 'permission' => 'Print Invoice' ])
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-sm table-striped table-bordered" id="resources-datatable" data-route="{{ route('datatable.transaction') }}">
            <thead class="bg-primary text-white">
                <th width="5%">Doc. No</th>
                <th width="5%">Date</th>
                <th width="5%">Account Code</th>
                <th width="20%">Description</th>
                <th width="5%">Batch No.</th>
                <th width="5%">Bill No.</th>
                <th width="5%">Total Tax</th>
                <th width="5%">Debit</th>
                <th width="5%">Credit</th>
                <th width="5%">Tariff Code</th>
            </thead>
        </table>
    </div>
</div>
@endsection

@push('scripts')
    @include('transaction.transaction.index-js')
@endpush