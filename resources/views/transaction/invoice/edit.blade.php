@extends('layouts.master')
@section('title', $resource->doc_no)
@section('subheader', 'Invoice')
@section('breadcrumbs', Breadcrumbs::render('invoice', $resource->doc_no))
@section('white-panel-extra')
    @include('components.form.others.edit-more-options')
@endsection

@php
    // for doc_no [ refer to: components.form.special.doc-no ]
    $table = 'acc_invmt';
    $route = 'transaction.invoice.edit';
    $current_id = $resource->id;
@endphp

@section('content')
<div class="sys-params"
    data-fetch-invoice-item-route="{{ route('transaction.invoice.fetch-invoice-item', 'ID') }}"
    data-fetch-item-route="{{ route('file-maintenance.item.fetch-by-code') }}"
    data-fetch-tax-route="{{ route('file-maintenance.tax-code.fetch-by-code') }}"
></div>

{!! Form::model($resource, ['url' => route('transaction.invoice.update', $resource->id), 'method' => 'PUT' ]) !!}
    <div class="form-group row">
        <div class="col-2">
            @include('components.form.others.a-btn-create-index', [
                'label' => 'New Record',
                'route' => route('transaction.invoice.create'),
                'permission' => 'Create Invoice',
            ])
        </div>
        <div class="col-2">
            <button type="button" class="btn bg-indigo text-white form-control btn-view-transaction">
                <i class="fas fa-book pr-2"></i>
                Transaction
            </button>
        </div>
        <div class="col-2">
            <button type="button" class="btn btn-danger text-white form-control btn-download">
                <i class="fas fa-file pr-2"></i>
                PDF
            </button>
        </div>
        <div class="col-2"></div>
        <div class="col-2"></div>
        <div class="col-2">
            <button type="submit" class="btn btn-success form-control btn-submit">
                <i class="fas fa-arrow-right pr-2"></i>
                Submit
            </button>
        </div>
    </div>

    @include('transaction.invoice.form', [ 'set_account_code' => $resource->account_code ])

{!! Form::close() !!}

@include('transaction.invoice.form-items')
@endsection

@push('scripts')
    @include('transaction.invoice.js')
    @include('transaction.invoice.entry-form-js')
@endpush
