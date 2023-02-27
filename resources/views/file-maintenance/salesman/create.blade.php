@extends('layouts.master')
@section('title', 'Salesman')
@section('subheader', 'Salesman')
@section('breadcrumbs', Breadcrumbs::render(
    'file-maintenance',
    'Salesman',
    route('file-maintenance.salesman.index'),
    'Create',
))

@section('content')
<div class="sys-params"></div>

{!! Form::open(['url' => route('file-maintenance.salesman.store') ]) !!}
    <div class="form-group row">
        <div class="col-10"></div>
        <div class="col-2">
            <button type="submit" class="btn btn-success form-control btn-submit">
                <i class="fas fa-arrow-right pr-2"></i>
                Submit
            </button>
        </div>
    </div>

    @include('file-maintenance.salesman.form')

{!! Form::close() !!}
@endsection
