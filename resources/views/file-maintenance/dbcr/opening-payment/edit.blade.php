@extends('layouts.master')
@section('title', $resource->doc_no)
@section('subheader', $resource->doc_no)
@section('breadcrumbs', Breadcrumbs::render(
    'file-maintenance',
    'Opening Payment',
    route('file-maintenance.opening-payment.index'),
    $resource->doc_no,
))
@section('white-panel-extra')
    @include('file-maintenance.more-options', [
        'delete_route' => route('file-maintenance.opening-payment.destroy', $resource->id)
    ])
@endsection

@section('content')
<div class="sys-params"
    data-is-debtor="{{ $resource->is_debtor }}"
    data-fetch-opening-info="{{ route('file-maintenance.opening-payment.fetch-info') }}">
</div>

{!! Form::model($resource, ['url' => route('file-maintenance.opening-payment.update', $resource->id), 'method' => 'PUT' ]) !!}
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

@include('components.form.others.open-create-page', [
    'permission' => 'Create Opening Payment',
    'route' => route('file-maintenance.opening-payment.create')
])
@endsection

@push('scripts')
    @include('file-maintenance.dbcr.opening-payment.js')
@endpush
