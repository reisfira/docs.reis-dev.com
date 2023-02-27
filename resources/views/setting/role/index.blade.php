@extends('layouts.master')
@section('title', 'Role')
@section('subheader', 'Role')
@section('breadcrumbs', Breadcrumbs::render('setting', 'Role', route('setting.role.index')))

@section('content')
<div class="sys-params" data-edit-route="{{ route('setting.role.edit', 'id') }}"></div>
<div class="form-group row">
    <div class="col-2">
        @include('components.form.others.a-btn-create-index', [ 'route' => route('setting.role.create'), 'permission' => 'Create Role' ])
    </div>
    <div class="col-2">
        @include('components.form.others.index-print', [ 'permission' => 'Print Role', 'form_title' => 'Role Print' ])
    </div>
    <div class="col-2">
        <a class="btn btn-danger form-control" href="{{ route('setting.permission.regenerate') }}"
            data-method="POST" data-confirm="This will remove everything and reinserts. You may need to refresh your cache and existing roles.">
            Regenerate Permissions
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        @include('components.form.special.datatable-filter', [
            '_search_columns_array' => config('kusimi.datatable-search-filters.role'),
            '_search_using_default' => false,
        ])
        <table class="table table-sm table-striped table-bordered" id="resources-datatable" data-route="{{ route('datatable.role') }}">
            <thead class="bg-primary text-white">
                <th width="5%">#</th>
                <th width="80%">Name</th>
            </thead>
        </table>
    </div>
</div>
@endsection

@section('modals')
    @include('components.modal.reporting')

    <div class="modal-form-templates d-none">
        @include('setting.index-print-modal', [ 'route' => route('setting.role.print'), 'types' => [ 'json', 'pdf', 'xlsx' ] ])
    </div>
@endsection

@push('scripts')
    @include('reporting.index-js')
    @include('setting.role.index-js')
@endpush