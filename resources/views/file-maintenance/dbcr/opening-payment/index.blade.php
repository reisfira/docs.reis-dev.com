@extends('layouts.master')
@section('title', 'Opening Payment')
@section('subheader', 'Opening Payment')
@section('breadcrumbs', Breadcrumbs::render('file-maintenance', 'Opening Payment', route('file-maintenance.opening-payment.index')))

@section('content')
<div class="sys-params" data-edit-route="{{ route('file-maintenance.opening-payment.edit', 'id') }}"></div>
<div class="form-group row">
    <div class="col-2">
        @include('components.form.others.a-btn-create-index', [ 'route' => route('file-maintenance.opening-payment.create'), 'permission' => 'Create Opening Payment' ])
    </div>
    <div class="col-2">
        @include('components.form.others.index-print', [ 'permission' => 'Print Opening Payment', 'form_title' => 'Opening Payment Print' ])
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-sm table-striped table-bordered" id="resources-datatable" data-route="{{ route('datatable.opening-payment') }}">
            <thead class="bg-primary text-white">
                <th width="5%">#</th>
                <th width="15%">Opening Payment</th>
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
        @include('file-maintenance.index-print-modal', [ 'route' => route('file-maintenance.opening-payment.print'), 'types' => [ 'json', 'pdf', 'xlsx' ] ])
    </div>
@endsection

@push('scripts')
    @include('reporting.index-js')
    @include('file-maintenance.dbcr.opening-payment.index-js')
@endpush