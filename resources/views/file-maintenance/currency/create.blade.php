@extends('layouts.master')
@section('title', 'Currency')
@section('subheader', 'Currency')
@section('breadcrumbs', Breadcrumbs::render(
    'file-maintenance',
    'Currency',
    route('file-maintenance.currency.index'),
    'Create',
))

@section('content')
<div class="sys-params"></div>

{!! Form::open(['url' => route('file-maintenance.currency.store') ]) !!}
    <div class="form-group row">
        <div class="col-10"></div>
        <div class="col-2">
            <button type="submit" class="btn btn-success form-control btn-submit">
                <i class="fas fa-arrow-right pr-2"></i>
                Submit
            </button>
        </div>
    </div>

    @include('file-maintenance.currency.form')

{!! Form::close() !!}
@endsection
