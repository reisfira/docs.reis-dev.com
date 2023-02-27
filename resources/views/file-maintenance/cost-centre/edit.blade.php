@extends('layouts.master')
@section('title', 'Cost Centre')
@section('subheader', 'Cost Centre')
@section('breadcrumbs', Breadcrumbs::render(
    'file-maintenance',
    'Cost Centre',
    route('file-maintenance.cost-centre.index'),
    $resource->code,
))
@section('content')
    {!! Form::model($resource, ['url' => route('file-maintenance.cost-centre.update', $resource->id), 'method' => 'PUT' ]) !!}
    @csrf
        <div class="form-group row">
        <div class="col-8"></div>
        <div class="col-2">
            @include('components.form.general.delete-master', [
                'route' => route('file-maintenance.cost-centre.destroy', $resource->id),
                'confirmation_prompt' => "Confirm delete this cost centre {$resource->details}?",
                'deletable' => !$has_transactions,
            ])
        </div>
        <div class="col-2">
            <button type="submit" class="btn btn-success form-control btn-submit">
                <i class="fas fa-arrow-right pr-2"></i>
                Submit
            </button>
        </div>
    </div>
        @include('file-maintenance.cost-centre.content')
    {!! Form::close() !!}
    @include('components.form.others.open-create-page', [
        'permission' => 'Create Cost Centre',
        'route' => route('file-maintenance.cost-centre.create')
    ])
@endsection

@push('scripts')
    @include('file-maintenance.cost-centre.js')
@endpush
