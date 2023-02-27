@extends('layouts.master')
@section('title', 'Tax Code')
@section('subheader', 'Tax Code')
@section('breadcrumbs', Breadcrumbs::render(
    'file-maintenance',
    'Tax Code',
    route('file-maintenance.tax-code.index'),
    'Create',
))

@section('content')
<div class="sys-params"></div>

{!! Form::open(['url' => route('file-maintenance.tax-code.store') ]) !!}
    <div class="form-group row">
        <div class="col-10"></div>
        <div class="col-2">
            <button type="submit" class="btn btn-success form-control btn-submit">
                <i class="fas fa-arrow-right pr-2"></i>
                Submit
            </button>
        </div>
    </div>

    @include('file-maintenance.tax-code.form')

{!! Form::close() !!}
@endsection
