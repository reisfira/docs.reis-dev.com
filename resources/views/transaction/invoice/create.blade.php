@extends('layouts.master')
@section('title', 'Invoice')
@section('subheader', 'Invoice')
@section('breadcrumbs', Breadcrumbs::render('invoice', 'Create'))

@php
    // for doc_no [ refer to: components.form.special.doc-no ]
    $table = 'acc_invmt';
    $route = 'transaction.invoice.edit';
    $current_id = null;
@endphp

@section('content')
<div class="sys-params"
    data-debtor-fetch="{{ route('file-maintenance.debtor.fetch-account-code') }}"
></div>

{!! Form::open(['url' => route('transaction.invoice.store') ]) !!}
    <div class="form-group row">
        <div class="col-10"></div>
        <div class="col-2">
            <button type="submit" class="btn btn-success form-control btn-submit">
                <i class="fas fa-arrow-right pr-2"></i>
                Submit
            </button>
        </div>
    </div>

    @include('transaction.invoice.form')

{!! Form::close() !!}
@endsection

@push('scripts')
    @include('transaction.invoice.js')
@endpush
