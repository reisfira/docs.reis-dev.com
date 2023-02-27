@extends('layouts.master')
@section('title', $resource->details)
@section('subheader', 'Debtor')
@section('breadcrumbs', Breadcrumbs::render(
    'file-maintenance',
    'Debtor',
    route('file-maintenance.debtor.index'),
    $resource->details,
))

@section('content')
<div class="sys-params"></div>

@php
    // for doc_no [ refer to: components.form.special.doc-no ]
    $table = 'debtor';
    $route = 'file-maintenance.debtor.edit';
    $current_id = $resource->id;
@endphp
{!! Form::model($resource, ['url' => route('file-maintenance.debtor.update', $resource->id), 'method' => 'PUT' ]) !!}
<div class="form-group row">
    <div class="col-8"></div>
    <div class="col-2">
        @include('components.form.general.delete-master', [
            'route' => route('file-maintenance.debtor.destroy', $resource->id),
            'confirmation_prompt' => "Confirm delete this debtor {$resource->details}?",
            // 'deletable' => !$has_transactions,
            'deletable' => false,
        ])
    </div>
    <div class="col-2">
        <button type="submit" class="btn btn-primary form-control">Submit</button>
    </div>
</div>

@include('file-maintenance.dbcr.debtor.form')

@include('file-maintenance.dbcr.debtor.view')

{!! Form::close() !!}

@include('components.form.others.open-create-page', [
    'permission' => 'Create Debtor',
    'route' => route('file-maintenance.debtor.create')
])
@endsection

@push('scripts-include')
    {{-- chart js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush

@push('scripts')
    @include('file-maintenance.dbcr.validate-code-js')
    @include('file-maintenance.dbcr.debtor.view-js')
@endpush
