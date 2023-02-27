@extends('layouts.master')
@section('title', 'Doc Type')
@section('subheader', 'Doc Type')
@section('breadcrumbs', Breadcrumbs::render('file-maintenance', 'doc-type', route('file-maintenance.doc-type.index')))

@section('content')
<div class="sys-params" data-edit-route="{{ route('file-maintenance.doc-type.edit', 'id') }}"></div>
<div class="form-group row">
    <div class="col-2">
        @include('components.form.others.a-btn-create-index', [ 'route' => route('file-maintenance.doc-type.create'), 'permission' => 'Create doc-type' ])
    </div>
    <div class="col-2">
        @include('components.form.others.index-print', [ 'permission' => 'Print Doc Type', 'form_title' => 'Doc Type Print' ])
    </div>
</div>

<div class="card">
    <div class="card-body">
        @include('components.form.special.datatable-filter')
        <table class="table table-sm table-striped table-bordered" id="resources-datatable" data-route="{{ route('datatable.doc-type') }}">
            <thead class="bg-primary text-white">
                <th width="5%">#</th>
                <th width="15%">Code</th>
                <th width="80%">Description</th>
            </thead>
        </table>
    </div>
</div>
@endsection

@section('modals')
    @include('components.modal.reporting')

    <div class="modal-form-templates d-none">
        @include('file-maintenance.index-print-modal', [ 'route' => route('file-maintenance.doc-type.print'), 'types' => [ 'json', 'pdf', 'xlsx' ] ])
    </div>
@endsection

@push('scripts')
    @include('reporting.index-js')
    @include('file-maintenance.doc-type.index-js')
@endpush