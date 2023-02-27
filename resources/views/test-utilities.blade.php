@extends('layouts.master')
@section('title', 'Home')

@section('content')
<div class="row">
    <div class="col-6">
        <div class="card card-primary">
            <div class="card-header">General</div>
            <div class="card-body">
                @include('components.form.general.text', ['name' => 'text_1', 'value' => 'Text 1'])
                <div class="mb-3"></div>

                @include('components.form.general.text-w-label', ['name' => 'text_2', 'label' => 'Label Text 2', 'value' => 'Text 2'])

                @include('components.form.general.text-w-label-lookup', ['name' => 'text_3', 'label' => 'Label Lookup 3', 'value' => 'Text 3'])

                @include('components.form.general.radio', ['name' => 'radio_1', 'id' => 'radio_1', 'label' => 'Radio 1'])

                @include('components.form.general.checkbox', ['name' => 'checkbox_1'])

                <button type="button" class="btn btn-primary btn-test-toastr px-3">Test Toastr</button>

                <button type="button" class="btn btn-info text-white btn-test-sweetalert px-3">Test Sweetalert</button>
            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="card card-primary">
            <div class="card-header">Reporting</div>
            <div class="card-body">

                <div class="form-group">
                    <button type="button" class="btn btn-info text-white report"
                        data-form-class=".test-template" data-form-title="Test Report">
                        Test Report
                    </button>
                </div>

                <div class="test-template">
                    @include('components.form.reporting.range', [
                        'name' => 'area',
                        'label' => 'Area',
                        'table' => 'area',
                        'lookup_url' => route('utilities.lookup.datatable'),
                        'context' => '.test-template',
                        'columns' => [ 'code' => 'Code', 'description' => 'Description', ]
                    ])
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('modals')
    @include('components.modal.reporting')
    @include('components.modal.search')
@endsection

@push('scripts')
    @include('reporting.index-js')
    @include('components.js.lookup-js')

    $('.btn-test-toastr').click( function() {
        toastr.success('Test Success')
    })

    $('.btn-test-sweetalert').click( function() {
        Swal.fire({
            title: 'Error!',
            text: 'Do you want to continue',
            icon: 'error',
            confirmButtonText: 'Cool'
        })
    })
@endpush