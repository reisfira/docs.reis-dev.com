@extends('layouts.master')
@section('title', 'Opening Bill')
@section('subheader', 'Opening Bill')
@section('breadcrumbs', Breadcrumbs::render(
    'file-maintenance',
    'Opening Bill',
    route('file-maintenance.opening-bill.index'),
    'Create',
))

@section('content')
<div class="sys-params"
    data-is-debtor="true"
    data-fetch-opening-info="{{ route('file-maintenance.opening-bill.fetch-info') }}">
</div>

{!! Form::open(['url' => route('file-maintenance.opening-bill.store') ]) !!}
    <div class="form-group row">
        <div class="col-10"></div>
        <div class="col-2">
            <button type="submit" class="btn btn-success form-control btn-submit">
                <i class="fas fa-arrow-right pr-2"></i>
                Submit
            </button>
        </div>
    </div>

    @include('file-maintenance.dbcr.opening-bill.form')

{!! Form::close() !!}
@endsection

@push('scripts')
    @include('file-maintenance.dbcr.opening-bill.js')
@endpush