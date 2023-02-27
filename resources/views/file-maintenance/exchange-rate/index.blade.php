@extends('layouts.master')
@section('title', 'Exchange Rate')
@section('subheader', 'Exchange Rate')
@section('breadcrumbs', Breadcrumbs::render('file-maintenance', 'Exchange Rate', route('file-maintenance.exchange-rate.index')))

@section('content')
<div class="sys-params" data-edit-route="{{ route('file-maintenance.exchange-rate.edit', 'id') }}"></div>
<div class="form-group row">
    <div class="col-2">
        @include('components.form.others.a-btn-create-index', [ 'route' => route('file-maintenance.exchange-rate.create'), 'permission' => 'Create Exchange Rate' ])
    </div>
    <div class="col-2">
        @include('components.form.others.index-print', [ 'permission' => 'Print Exchange Rate' ])
    </div>
</div>

<div class="card">
    <div class="card-body">
        @include('components.form.special.datatable-filter')
        <table class="table table-sm table-striped table-bordered" id="resources-datatable" data-route="{{ route('datatable.exchange-rate') }}">
            <thead class="bg-primary text-white">
                <th width="5%">#</th>
                <th width="15%">Exchange Rate</th>
                <th width="80%">Description</th>
            </thead>
        </table>
    </div>
</div>
@endsection

@section('modals')
    @include('components.modal.reporting')

    <div class="modal-form-templates d-none">
        @include('file-maintenance.index-print-modal', [ 'route' => route('file-maintenance.exchange-rate.print'), 'types' => [ 'json', 'pdf', 'xlsx' ] ])
    </div>
@endsection

@push('scripts')
    @include('reporting.index-js')
    @include('file-maintenance.exchange-rate.index-js')
@endpush