@extends('layouts.master')
@section('title', 'Tax Code')
@section('subheader', 'Tax Code')
@section('breadcrumbs', Breadcrumbs::render('file-maintenance', 'Tax Code', route('file-maintenance.tax-code.index')))

@section('content')
<div class="sys-params" data-edit-route="{{ route('file-maintenance.tax-code.edit', 'id') }}"></div>
<div class="form-group row">
    <div class="col-2">
        @include('components.form.others.a-btn-create-index', [ 'route' => route('file-maintenance.tax-code.create'), 'permission' => 'Create TaxCode' ])
    </div>
    <div class="col-2">
        @include('components.form.others.index-print', [ 'permission' => 'Print Tax Code' ])
    </div>
    <div class="col-2">
        <a href="{{ route('file-maintenance.tax-code.default') }}" class="btn btn-danger form-control"
            data-method="POST" data-confirm="This will reset your tax code table. It will not affect existing transaction. Confirm to proceed?">
            <i class="fas fa-refresh pr-2"></i>
            Regenerate
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        @include('components.form.special.datatable-filter')
        <table class="table table-sm table-striped table-bordered" id="resources-datatable" data-route="{{ route('datatable.tax-code') }}">
            <thead class="bg-primary text-white">
                <th width="5%">#</th>
                <th width="15%">TaxCode</th>
                <th width="80%">Description</th>
            </thead>
        </table>
    </div>
</div>
@endsection

@section('modals')
    @include('components.modal.reporting')

    <div class="modal-form-templates d-none">
        @include('file-maintenance.index-print-modal', [ 'route' => route('file-maintenance.tax-code.print'), 'types' => [ 'json', 'pdf', 'xlsx' ] ])
    </div>
@endsection

@push('scripts')
    @include('reporting.index-js')
    @include('file-maintenance.tax-code.index-js')
@endpush