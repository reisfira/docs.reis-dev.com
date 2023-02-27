@extends('layouts.master')
@section('title', 'Payment Method')
@section('subheader', 'Payment Method')
@section('breadcrumbs', Breadcrumbs::render(
    'file-maintenance',
    'Payment Method',
    route('file-maintenance.payment-method.index'),
    'Create',
))

@section('content')
<div class="sys-params"></div>

{!! Form::open(['url' => route('file-maintenance.payment-method.store') ]) !!}
    <div class="form-group row">
        <div class="col-10"></div>
        <div class="col-2">
            <button type="submit" class="btn btn-success form-control btn-submit">
                <i class="fas fa-arrow-right pr-2"></i>
                Submit
            </button>
        </div>
    </div>

    @include('file-maintenance.payment-method.form')

{!! Form::close() !!}
@endsection
