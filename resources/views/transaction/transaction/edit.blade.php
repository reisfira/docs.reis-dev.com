@extends('layouts.master')
@section('title', 'Transaction')
@section('subheader', 'Transaction')
@section('breadcrumbs', Breadcrumbs::render(
    'transaction',
    'Transaction',
    route('transaction.transaction.index'),
    'Edit',
))

@section('content')
<div class="sys-params"
    data-is-debtor="true"
    data-fetch-tax-route="{{ route('file-maintenance.tax-code.fetch-by-code') }}"
    data-fetch-transaction-route="{{ route('transaction.transaction.fetch-by-doc-no') }}"
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
@include('transaction.transaction.form')


@include('components.form.others.open-create-page', [
    'permission' => 'Create Transaction',
    'route' => route('transaction.transaction.create')
])
@endsection

@section('modals')
    @include('transaction.transaction.components.modal.search')

@endsection

@push('scripts')
    @include('transaction.transaction.js')
    @include('transaction.transaction.search-js')

@endpush