@extends('layouts.master')
@section('title', 'Industrial Classification')
@section('subheader', 'Industrial Classification')
@section('breadcrumbs', Breadcrumbs::render('file-maintenance', 'Industrial Classification', route('file-maintenance.industrial-classification.index')))

@section('content')
<div class="sys-params" data-edit-route="{{ route('file-maintenance.industrial-classification.edit', 'id') }}"></div>
<div class="form-group row">
    <div class="col-2">
        @include('components.form.others.a-btn-create-index', [ 'route' => route('file-maintenance.industrial-classification.create'), 'permission' => 'Create IndustrialClassification' ])
    </div>
    <div class="col-2">
        @include('components.form.others.index-print', [ 'permission' => 'Print IndustrialClassification' ])
    </div>
</div>

<div class="card">
    <div class="card-body">
        @include('components.form.special.datatable-filter')
        <table class="table table-sm table-striped table-bordered" id="resources-datatable" data-route="{{ route('datatable.industrial-classification') }}">
            <thead class="bg-primary text-white">
                <th width="5%">#</th>
                <th width="15%">Industrial Classification</th>
                <th width="80%">Description</th>
            </thead>
        </table>
    </div>
</div>
@endsection

@section('modals')
    @include('components.modal.reporting')

    <div class="modal-form-templates d-none">
        @include('file-maintenance.index-print-modal', [ 'route' => route('file-maintenance.industrial-classification.print'), 'types' => [ 'json', 'pdf', 'xlsx' ] ])
    </div>
@endsection

@push('scripts')
    @include('reporting.index-js')
    @include('file-maintenance.industrial-classification.index-js')
@endpush