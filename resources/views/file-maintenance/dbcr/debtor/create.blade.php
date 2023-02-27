@extends('layouts.master')
@section('title', 'Debtor')
@section('subheader', 'Debtor')
@section('breadcrumbs', Breadcrumbs::render('debtor', 'Create'))

@section('content')
<div class="sys-params"></div>

@php
    // for doc_no [ refer to: components.form.special.doc-no ]
    $table = 'debtor';
    $route = 'file-maintenance.debtor.edit';
    $current_id = null;
@endphp
{!! Form::open(['url' => route('file-maintenance.debtor.store') ]) !!}
<div class="form-group row">
    <div class="col-10"></div>
    <div class="col-2">
        <button type="submit" class="btn btn-primary form-control">Submit</button>
    </div>
</div>

@include('file-maintenance.dbcr.debtor.form')

{!! Form::close() !!}
@endsection

@push('scripts')
    @include('file-maintenance.dbcr.validate-code-js')
@endpush
