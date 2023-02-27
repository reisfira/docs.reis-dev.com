@extends('layouts.master')
@section('title', $resource->code)
@section('subheader', $resource->code)
@section('breadcrumbs', Breadcrumbs::render(
    'file-maintenance',
    'Tax Code',
    route('file-maintenance.tax-code.index'),
    $resource->code,
))

@section('content')
<div class="sys-params"></div>

{!! Form::model($resource, ['url' => route('file-maintenance.tax-code.update', $resource->id), 'method' => 'PUT' ]) !!}
    <div class="form-group row">
        <div class="col-8"></div>
        <div class="col-2">
            @include('components.form.general.delete-master', [
                'route' => route('file-maintenance.tax-code.destroy', $resource->id),
                'confirmation_prompt' => "Confirm delete this tax code {$resource->details}?",
                'deletable' => true,
            ])
        </div>
        <div class="col-2">
            <button type="submit" class="btn btn-success form-control btn-submit">
                <i class="fas fa-arrow-right pr-2"></i>
                Submit
            </button>
        </div>
    </div>

    @include('file-maintenance.tax-code.form')
{!! Form::close() !!}

@include('components.form.others.open-create-page', [
    'permission' => 'Create TaxCode',
    'route' => route('file-maintenance.tax-code.create')
])
@endsection
