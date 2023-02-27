@extends('layouts.master')
@section('title', 'Area')
@section('subheader', 'Area')
@section('breadcrumbs', Breadcrumbs::render(
    'file-maintenance',
    'Area',
    route('file-maintenance.area.index'),
    'Create',
))

@section('content')
<div class="sys-params"></div>

{!! Form::open(['url' => route('file-maintenance.area.store') ]) !!}
    <div class="form-group row">
        <div class="col-10"></div>
        <div class="col-2">
            <button type="submit" class="btn btn-success form-control btn-submit">
                <i class="fas fa-arrow-right pr-2"></i>
                Submit
            </button>
        </div>
    </div>

    @include('file-maintenance.area.form')

{!! Form::close() !!}
@endsection
