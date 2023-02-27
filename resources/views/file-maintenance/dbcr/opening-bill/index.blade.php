@extends('layouts.master')
@section('title', 'Opening Bill')
@section('subheader', 'Opening Bill')
@section('breadcrumbs', Breadcrumbs::render('file-maintenance', 'Opening Bill', route('file-maintenance.opening-bill.index')))

@section('content')
<div class="sys-params" data-edit-route="{{ route('file-maintenance.opening-bill.edit', 'id') }}"></div>
<div class="form-group row">
    <div class="col-2">
        @include('components.form.others.a-btn-create-index', [ 'route' => route('file-maintenance.opening-bill.create'), 'permission' => 'Create Opening Bill' ])
    </div>
    <div class="col-2">
        @include('components.form.others.index-print', [ 'permission' => 'Print Opening Bill', 'form_title' => 'Opening Bill Print' ])
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-sm table-striped table-bordered" id="resources-datatable" data-route="{{ route('datatable.opening-bill') }}">
            <thead class="bg-primary text-white">
                <th width="5%">#</th>
                <th width="15%">Opening Bill</th>
                <th width="20%">Date</th>
                <th width="20%">Account Code</th>
                <th width="20%">Debit</th>
                <th width="20%">Credit</th>
            </thead>
        </table>
    </div>
</div>
@endsection

@section('modals')
    @include('components.modal.reporting')

    <div class="modal-form-templates d-none">
        @include('file-maintenance.index-print-modal', [ 'route' => route('file-maintenance.opening-bill.print'), 'types' => [ 'json', 'pdf', 'xlsx' ] ])
    </div>
@endsection

@push('scripts')
    @include('reporting.index-js')
    @include('file-maintenance.dbcr.opening-bill.index-js')
@endpush