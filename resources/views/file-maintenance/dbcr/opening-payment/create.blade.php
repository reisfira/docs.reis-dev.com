@extends('layouts.master')
@section('title', 'Opening Payment')
@section('subheader', 'Opening Payment')
@section('breadcrumbs', Breadcrumbs::render(
    'file-maintenance',
    'Opening Payment',
    route('file-maintenance.opening-payment.index'),
    'Create',
))

@section('content')
<div class="sys-params"
    data-is-debtor="true"
    data-fetch-opening-info="{{ route('file-maintenance.opening-payment.fetch-info') }}">
</div>

{!! Form::open(['url' => route('file-maintenance.opening-payment.store') ]) !!}
    <div class="form-group row">
        <div class="col-10"></div>
        <div class="col-2">
            <button type="submit" class="btn btn-success form-control btn-submit">
                <i class="fas fa-arrow-right pr-2"></i>
                Submit
            </button>
        </div>
    </div>

    @include('file-maintenance.dbcr.opening-payment.form')

{!! Form::close() !!}
@endsection

@push('scripts')
    @include('file-maintenance.dbcr.opening-payment.js')
@endpush