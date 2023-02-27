@extends('layouts.master')
@section('title', 'Doc Type')
@section('subheader', 'Doc Type')
@section('breadcrumbs', Breadcrumbs::render(
    'file-maintenance',
    'Doc Type',
    route('file-maintenance.doc-type.index'),
    'Create',
))

@section('content')
<div class="sys-params"></div>

{!! Form::open(['url' => route('file-maintenance.doc-type.store') ]) !!}
    <div class="form-group row">
        <div class="col-10"></div>
        <div class="col-2">
            <button type="submit" class="btn btn-success form-control btn-submit">
                <i class="fas fa-arrow-right pr-2"></i>
                Submit
            </button>
        </div>
    </div>

    @include('file-maintenance.doc-type.form')

{!! Form::close() !!}
@endsection
