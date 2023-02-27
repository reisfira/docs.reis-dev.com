@extends('layouts.master')
@section('title', $resource->currency_code)
@section('subheader', $resource->currency_code)
@section('breadcrumbs', Breadcrumbs::render(
    'file-maintenance',
    'Exchange Rate',
    route('file-maintenance.exchange-rate.index'),
    $resource->currency_code,
))
@section('white-panel-extra')
    @include('file-maintenance.more-options', [
        'delete_route' => route('file-maintenance.exchange-rate.destroy', $resource->id)
    ])
@endsection

@section('content')
<div class="sys-params"></div>

{!! Form::model($resource, ['url' => route('file-maintenance.exchange-rate.update', $resource->id), 'method' => 'PUT' ]) !!}
    <div class="form-group row">
        <div class="col-8"></div>
        <div class="col-2">
            @include('components.form.general.delete-master', [
                'route' => route('file-maintenance.exchange-rate.destroy', $resource->id),
                'confirmation_prompt' => "Confirm delete this {$resource->currency_code} rate [ {$resource->rate} ]?",
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

    @include('file-maintenance.exchange-rate.form')
{!! Form::close() !!}

@include('components.form.others.open-create-page', [
    'permission' => 'Create Exchange Rate',
    'route' => route('file-maintenance.exchange-rate.create')
])
@endsection
