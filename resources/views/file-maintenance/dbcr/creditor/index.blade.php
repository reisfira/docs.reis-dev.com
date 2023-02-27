@extends('layouts.master')
@section('title', 'Creditor')
@section('subheader', 'Creditor')
@section('breadcrumbs', Breadcrumbs::render('creditor'))

@section('content')
<div class="sys-params" data-edit-route="{{ route('file-maintenance.creditor.edit', 'id') }}"></div>
<div class="form-group row">
    <div class="col-3">
        @include('components.form.others.a-btn-create-index', ['route' => route('file-maintenance.creditor.create'), 'permission' => true])
    </div>
    <div class="col-3">
        @include('components.form.others.index-print', [ 'permission' => 'Print Creditor' ])
    </div>
    <div class="col-3"></div>
    <div class="col-3"></div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-sm table-striped table-bordered" id="accounts-datatable" data-route="{{ route('datatable.creditor') }}">
            <thead class="bg-primary text-white">
                <th width="10%">A/C Code</th>
                <th width="10%">Ref Code</th>
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

    <div class="modal-form-templates d-none">
        @include('file-maintenance.index-print-modal', [ 'route' => route('file-maintenance.creditor.print'), 'types' => [ 'json', 'pdf', 'xlsx' ] ])
    </div>
@endsection

@push('scripts')
    @include('reporting.index-js')
    @include('file-maintenance.dbcr.creditor.index-js')
@endpush