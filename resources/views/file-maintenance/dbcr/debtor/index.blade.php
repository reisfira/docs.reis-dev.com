@extends('layouts.master')
@section('title', 'Debtor')
@section('subheader', 'Debtor')
@section('breadcrumbs', Breadcrumbs::render('file-maintenance', 'Debtor'))

@section('content')
<div class="sys-params" data-edit-route="{{ route('file-maintenance.debtor.edit', 'id') }}"></div>
<div class="form-group row">
    <div class="col-3">
        @include('components.form.others.a-btn-create-index', ['route' => route('file-maintenance.debtor.create'), 'permission' => true])
    </div>
    <div class="col-3">
        @include('components.form.others.index-print', [ 'permission' => 'Print Debtor', 'form_title' => 'Debtor Print' ])
    </div>
    <div class="col-3"></div>
    <div class="col-3"></div>
</div>

<div class="card">
    <div class="card-body">
        @include('components.form.special.datatable-filter', [
            '_search_columns_array' => config('kusimi.datatable-search-filters.dbcr'),
            '_search_using_default' => false,
        ])
        <table class="table table-sm table-striped table-bordered" id="resources-datatable" data-route="{{ route('datatable.debtor') }}">
            <thead class="bg-primary text-white">
                <th width="5%">S/N</th>
                <th width="15%">A/C Code</th>
                <th width="30%">Name</th>
                <th width="10%">Tel</th>
                <th width="10%">Fax</th>
                <th width="10%">Email</th>
                <th width="10%">Currency</th>
                <th width="10%">Opening</th>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
@endsection

@section('modals')
    @include('components.modal.reporting')
    @include('components.modal.search')

    <div class="modal-form-templates d-none">
        @include('file-maintenance.dbcr.debtor.index-print-modal', [ 'route' => route('file-maintenance.debtor.print'), 'types' => [ 'json', 'pdf', 'xlsx' ] ])
    </div>
@endsection

@push('scripts')
    @include('reporting.index-js')
    @include('components.js.lookup-js')
    @include('file-maintenance.dbcr.debtor.index-js')
@endpush