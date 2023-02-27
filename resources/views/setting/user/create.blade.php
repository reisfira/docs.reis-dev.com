@extends('layouts.master')
@section('title', 'User')
@section('subheader', 'User')
@section('breadcrumbs', Breadcrumbs::render(
    'setting',
    'User',
    route('setting.user.index'),
    'Create',
))

@section('content')
<div class="sys-params"></div>

{!! Form::open(['url' => route('setting.user.store') ]) !!}
    <div class="form-group row">
        <div class="col-10"></div>
        <div class="col-2">
            <button type="submit" class="btn btn-success form-control btn-submit">
                <i class="fas fa-arrow-right pr-2"></i>
                Submit
            </button>
        </div>
    </div>

    @include('setting.user.form')

{!! Form::close() !!}
@endsection
