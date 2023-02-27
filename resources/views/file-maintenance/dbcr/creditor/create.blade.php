@extends('layouts.master')
@section('title', 'Creditor')
@section('subheader', 'Creditor')
@section('breadcrumbs', Breadcrumbs::render('creditor', 'Create'))

@section('content')
<div class="sys-params"></div>

{!! Form::open(['url' => route('file-maintenance.creditor.store') ]) !!}
<div class="form-group row">
    <div class="col-10"></div>
    <div class="col-2">
        <button type="submit" class="btn btn-primary form-control">Submit</button>
    </div>
</div>

@include('file-maintenance.dbcr.creditor.form')

{!! Form::close() !!}
@endsection

@push('scripts')
    @include('file-maintenance.dbcr.validate-code-js')
@endpush
