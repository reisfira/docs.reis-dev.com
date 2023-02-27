@extends('layouts.master')
@section('title', 'Transaction')
@section('subheader', 'Transaction')
@section('breadcrumbs', Breadcrumbs::render(
    'transaction',
    'Receipt Voucher',
    route('transaction.receipt-voucher.index'),
    'Edit',
))

@section('content')
<div class="sys-params"
    data-is-debtor="true"
    data-fetch-tax-route="{{ route('file-maintenance.tax-code.fetch-by-code') }}"
    data-fetch-transaction-route="{{ route('transaction.transaction.fetch-by-doc-no') }}"
    data-fetch-bill-item-route="{{ route('transaction.receipt-voucher.fetch-bill-item') }}"
    data-resource-id="{{ isset($resource->id)?$resource->id:'' }}"
    data-resource-doc-no="{{ isset($resource->doc_no)?$resource->doc_no:'' }}"
    >
</div>

@php
    // for doc_no [ refer to: components.form.special.doc-no ]
    $table = 'acc_trn';
    $route = 'transaction.transaction.edit';
    $current_id = isset($resource->id)?$resource->id:'';
@endphp
@include('transaction.receipt-voucher.form')
@include('transaction.receipt-voucher.components.table.table')

@include('components.form.others.open-create-page', [
    'permission' => 'Create Transaction',
    'route' => route('transaction.transaction.create')
])
@endsection

@push('scripts')
    let runningNumber = $('.system-settings-param').data('running-number')
    @include('transaction.receipt-voucher.voucher-calculation')
    calculateTotals()
    @include('transaction.receipt-voucher.voucher-dbcr-select-js')

@endpush