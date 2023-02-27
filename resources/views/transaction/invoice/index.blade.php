@extends('layouts.master')
@section('title', 'Invoice')
@section('subheader', 'Invoice')
@section('breadcrumbs', Breadcrumbs::render('invoice'))

@section('content')
<div class="sys-params" data-edit-route="{{ route('transaction.invoice.edit', 'id') }}"></div>
<div class="form-group row">
    <div class="col-2">
        @include('components.form.others.a-btn-create-index', [ 'route' => route('transaction.invoice.create'), 'permission' => 'Create Invoice' ])
    </div>
    <div class="col-2">
        @include('components.form.others.index-print', [ 'permission' => 'Print Invoice' ])
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-sm table-striped table-bordered" id="resources-datatable" data-route="{{ route('datatable.invoice') }}">
            <thead class="bg-primary text-white">
                <th width="10%">Doc. No</th>
                <th width="10%">Date</th>
                <th width="10%">Account Code</th>
                <th width="20%">Name</th>
                <th width="10%">Batch No.</th>
                <th width="10%">Discount</th>
                <th width="10%">Total Amount</th>
                <th width="10%">Total Tax</th>
                <th width="10%">Grand Total</th>
            </thead>
        </table>
    </div>
</div>
@endsection

@push('scripts')
    @include('transaction.invoice.index-js')
@endpush