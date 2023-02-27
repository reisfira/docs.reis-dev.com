@extends('layouts.master')
@section('title', 'Currency')
@section('subheader', 'Currency')
@section('breadcrumbs', Breadcrumbs::render('file-maintenance', 'Currency', route('file-maintenance.currency.index')))

@section('content')
<div class="sys-params" data-edit-route="{{ route('file-maintenance.currency.edit', 'id') }}"></div>
<div class="form-group row">
    <div class="col-2">
        @include('components.form.others.a-btn-create-index', [ 'route' => route('file-maintenance.currency.create'), 'permission' => 'Create Currency' ])
    </div>
    <div class="col-2">
        @include('components.form.others.index-print', [ 'permission' => 'Print Currency' ])
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-sm table-striped table-bordered" id="resources-datatable" data-route="{{ route('datatable.currency') }}">
            <thead class="bg-primary text-white">
                <th width="5%">#</th>
                <th width="15%">Currency</th>
                <th width="80%">Description</th>
            </thead>
        </table>
    </div>
</div>
@endsection

@section('modals')
    @include('components.modal.reporting')

    <div class="modal-form-templates d-none">
        @include('file-maintenance.index-print-modal', [ 'route' => route('file-maintenance.currency.print'), 'types' => [ 'json', 'pdf', 'xlsx' ] ])
    </div>
@endsection

@push('scripts')
    @include('reporting.index-js')
    @include('file-maintenance.currency.index-js')
@endpush