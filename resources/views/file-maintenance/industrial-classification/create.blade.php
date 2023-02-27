@extends('layouts.master')
@section('title', 'Industrial Classification')
@section('subheader', 'Industrial Classification')
@section('breadcrumbs', Breadcrumbs::render(
    'file-maintenance',
    'Industrial Classification',
    route('file-maintenance.industrial-classification.index'),
    'Create',
))

@section('content')
<div class="sys-params"></div>

{!! Form::open(['url' => route('file-maintenance.industrial-classification.store') ]) !!}
    <div class="form-group row">
        <div class="col-10"></div>
        <div class="col-2">
            <button type="submit" class="btn btn-success form-control btn-submit">
                <i class="fas fa-arrow-right pr-2"></i>
                Submit
            </button>
        </div>
    </div>

    @include('file-maintenance.industrial-classification.form')

{!! Form::close() !!}
@endsection
