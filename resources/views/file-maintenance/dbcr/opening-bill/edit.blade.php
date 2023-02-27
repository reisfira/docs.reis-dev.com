@extends('layouts.master')
@section('title', $resource->doc_no)
@section('subheader', $resource->doc_no)
@section('breadcrumbs', Breadcrumbs::render(
    'file-maintenance',
    'Opening Bill',
    route('file-maintenance.opening-bill.index'),
    $resource->doc_no,
))
@section('white-panel-extra')
    @include('file-maintenance.more-options', [
        'delete_route' => route('file-maintenance.opening-bill.destroy', $resource->id)
    ])
@endsection

@section('content')
<div class="sys-params"
    data-is-debtor="{{ $resource->is_debtor }}"
    data-fetch-opening-info="{{ route('file-maintenance.opening-bill.fetch-info') }}">
</div>

{!! Form::model($resource, ['url' => route('file-maintenance.opening-bill.update', $resource->id), 'method' => 'PUT' ]) !!}
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

@include('components.form.others.open-create-page', [
    'permission' => 'Create Opening Bill',
    'route' => route('file-maintenance.opening-bill.create')
])
@endsection

@push('scripts')
    @include('file-maintenance.dbcr.opening-bill.js')
@endpush
