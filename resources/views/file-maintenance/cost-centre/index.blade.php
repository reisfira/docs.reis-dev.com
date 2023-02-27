@extends('layouts.master')
@section('title', 'Cost Centre')
@section('subheader', 'Cost Centre')
@section('breadcrumbs', Breadcrumbs::render('file-maintenance', 'Cost Centre', route('file-maintenance.cost-centre.index')))

@section('content')
<div class="sys-params" data-edit-route="{{ route('file-maintenance.cost-centre.edit', 'id') }}"></div>
<div class="form-group row">
    <div class="col-2">
        @include('components.form.others.a-btn-create-index', [ 'route' => route('file-maintenance.cost-centre.create'), 'permission' => 'Create Cost Centre' ])
    </div>
    <div class="col-2">
        @include('components.form.others.index-print', [ 'permission' => 'Print Cost Centre', 'form_title' => 'Cost Centre Print' ])
    </div>
</div>

<div class="card">
    <div class="card-body">
        @include('components.form.special.datatable-filter')
        <table class="table table-sm table-striped table-bordered" id="resources-datatable" data-route="{{ route('datatable.cost_centre') }}">
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
        @include('file-maintenance.index-print-modal', [ 'route' => route('file-maintenance.cost-centre.print'), 'types' => [ 'json', 'pdf', 'xlsx' ] ])
    </div>
@endsection

@push('scripts')
    @include('reporting.index-js')
    @include('file-maintenance.cost-centre.index-js')
@endpush