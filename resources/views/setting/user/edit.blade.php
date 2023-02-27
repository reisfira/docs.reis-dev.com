@extends('layouts.master')
@section('title', $resource->code)
@section('subheader', $resource->code)
@section('breadcrumbs', Breadcrumbs::render(
    'setting',
    'User',
    route('setting.user.index'),
    $resource->code,
))

@section('content')
<div class="sys-params"></div>

{!! Form::model($resource, ['url' => route('setting.user.update', $resource->id), 'method' => 'PUT' ]) !!}
    <div class="form-group row">
        <div class="col-8"></div>
        <div class="col-2">
            @include('components.form.general.delete-master', [
                'route' => route('setting.user.destroy', $resource->id),
                'confirmation_prompt' => "Confirm delete this user {$resource->name}?",
                'deletable' => true,
            ])
        </div>
        <div class="col-2">
            <button type="submit" class="btn btn-success form-control btn-submit">
                <i class="fas fa-arrow-right pr-2"></i>
                Submit
            </button>
        </div>
    </div>

    @include('setting.user.form')
{!! Form::close() !!}

@include('components.form.others.open-create-page', [
    'permission' => 'Create User',
    'route' => route('setting.user.create')
])
@endsection
