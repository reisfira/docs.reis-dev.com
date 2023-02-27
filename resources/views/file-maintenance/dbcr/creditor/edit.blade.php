@extends('layouts.master')
@section('title', $resource->details)
@section('subheader', 'Creditor')
@section('breadcrumbs', Breadcrumbs::render('creditor', $resource->details))

@section('content')
<div class="sys-params"></div>

{!! Form::model($resource, ['url' => route('file-maintenance.creditor.update', $resource->id), 'method' => 'PUT' ]) !!}
<div class="form-group row">
    <div class="col-8"></div>
    <div class="col-2">
        <a class="btn btn-danger form-control" href="{{ route('file-maintenance.creditor.destroy', $resource->id) }}" data-method="DELETE" data-confirm="Confirm delet this debtor {{ $resource->details }}">
            <i class="fas fa-trash pr-2"></i>
            Delete
        </a>
    </div>
    <div class="col-2">
        <button type="submit" class="btn btn-primary form-control">Submit</button>
    </div>
</div>

@include('file-maintenance.dbcr.creditor.form')

@include('file-maintenance.dbcr.creditor.view')

{!! Form::close() !!}

@include('components.form.others.open-create-page', [
    'permission' => 'Create Creditor',
    'route' => route('file-maintenance.creditor.create')
])
@endsection

@push('scripts-include')
    {{-- chart js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush

@push('scripts')
    @include('file-maintenance.dbcr.validate-code-js')
    @include('file-maintenance.dbcr.creditor.view-js')
@endpush
