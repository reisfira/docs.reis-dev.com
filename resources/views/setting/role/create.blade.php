@extends('layouts.master')
@section('title', 'Role')
@section('subheader', 'Role')
@section('breadcrumbs', Breadcrumbs::render(
    'setting',
    'Role',
    route('setting.role.index'),
    'Create',
))

@section('content')
<div class="sys-params"></div>

{!! Form::open(['url' => route('setting.role.store') ]) !!}
    <div class="form-group row">
        <div class="col-10"></div>
        <div class="col-2">
            <button type="submit" class="btn btn-success form-control btn-submit">
                <i class="fas fa-arrow-right pr-2"></i>
                Submit
            </button>
        </div>
    </div>

    @include('setting.role.form')

{!! Form::close() !!}
@endsection

@push('scripts')
    @include('setting.role.js')
@endpush