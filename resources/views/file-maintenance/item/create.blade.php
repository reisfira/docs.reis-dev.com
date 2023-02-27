@extends('layouts.master')
@section('title', 'Item')
@section('subheader', 'Item')
@section('breadcrumbs', Breadcrumbs::render(
    'file-maintenance',
    'Item',
    route('file-maintenance.item.index'),
    'Create',
))

@section('content')
<div class="sys-params"></div>

{!! Form::open(['url' => route('file-maintenance.item.store') ]) !!}
    <div class="form-group row">
        <div class="col-10"></div>
        <div class="col-2">
            <button type="submit" class="btn btn-success form-control btn-submit">
                <i class="fas fa-arrow-right pr-2"></i>
                Submit
            </button>
        </div>
    </div>

    @include('file-maintenance.item.form')

{!! Form::close() !!}
@endsection