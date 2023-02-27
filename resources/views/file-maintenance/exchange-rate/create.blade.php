@extends('layouts.master')
@section('title', 'Exchange Rate')
@section('subheader', 'Exchange Rate')
@section('breadcrumbs', Breadcrumbs::render(
    'file-maintenance',
    'Exchange Rate',
    route('file-maintenance.exchange-rate.index'),
    'Create',
))

@section('content')
<div class="sys-params"></div>

{!! Form::open(['url' => route('file-maintenance.exchange-rate.store') ]) !!}
    <div class="form-group row">
        <div class="col-10"></div>
        <div class="col-2">
            <button type="submit" class="btn btn-success form-control btn-submit">
                <i class="fas fa-arrow-right pr-2"></i>
                Submit
            </button>
        </div>
    </div>

    @include('file-maintenance.exchange-rate.form')

{!! Form::close() !!}
@endsection
