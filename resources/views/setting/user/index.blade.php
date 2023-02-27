@extends('layouts.master')
@section('title', 'User')
@section('subheader', 'User')
@section('breadcrumbs', Breadcrumbs::render('setting', 'User', route('setting.user.index')))

@section('content')
<div class="sys-params" data-edit-route="{{ route('setting.user.edit', 'id') }}"></div>
<div class="form-group row">
    <div class="col-2">
        @include('components.form.others.a-btn-create-index', [ 'route' => route('setting.user.create'), 'permission' => 'Create User' ])
    </div>
    <div class="col-2">
        @include('components.form.others.index-print', [ 'permission' => 'Print User', 'form_title' => 'User Print' ])
    </div>
</div>

<div class="card">
    <div class="card-body">
        @include('components.form.special.datatable-filter', [
            '_search_columns_array' => config('kusimi.datatable-search-filters.user'),
            '_search_using_default' => false,
        ])
        <table class="table table-sm table-striped table-bordered" id="resources-datatable" data-route="{{ route('datatable.user') }}">
            <thead class="bg-primary text-white">
                <th width="5%">#</th>
                <th width="40%">Name</th>
                <th width="40%">Email</th>
            </thead>
        </table>
    </div>
</div>
@endsection

@section('modals')
    @include('components.modal.reporting')

    <div class="modal-form-templates d-none">
        @include('setting.index-print-modal', [ 'route' => route('setting.user.print'), 'types' => [ 'json', 'pdf', 'xlsx' ] ])
    </div>
@endsection

@push('scripts')
    @include('reporting.index-js')
    @include('setting.user.index-js')
@endpush