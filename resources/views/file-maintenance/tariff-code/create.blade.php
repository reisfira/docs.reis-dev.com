@extends('layouts.master')
@section('title', 'Tariff Code')
@section('subheader', 'Tariff Code')
@section('breadcrumbs', Breadcrumbs::render(
    'file-maintenance',
    'Tariff Code',
    route('file-maintenance.tariff-code.index'),
    'Create',
))

@section('content')
<div class="sys-params"></div>

{!! Form::open(['url' => route('file-maintenance.tariff-code.store') ]) !!}
    <div class="form-group row">
        <div class="col-10"></div>
        <div class="col-2">
            <button type="submit" class="btn btn-success form-control btn-submit">
                <i class="fas fa-arrow-right pr-2"></i>
                Submit
            </button>
        </div>
    </div>

    @include('file-maintenance.tariff-code.form')

{!! Form::close() !!}
@endsection
