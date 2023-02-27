@extends('layouts.master')
@section('title', $resource->name)
@section('subheader', $resource->name)
@section('breadcrumbs', Breadcrumbs::render(
    'setting',
    'Role',
    route('setting.role.index'),
    $resource->name,
))

@section('content')
<div class="sys-params"></div>

{!! Form::model($resource, ['url' => route('setting.role.update', $resource->id), 'method' => 'PUT' ]) !!}
    <div class="form-group row">
        <div class="col-8"></div>
        <div class="col-2">
            @include('components.form.general.delete-master', [
                'route' => route('setting.role.destroy', $resource->id),
                'confirmation_prompt' => "Confirm delete this role {$resource->name}?",
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

    @include('setting.role.form')
{!! Form::close() !!}

@include('components.form.others.open-create-page', [
    'permission' => 'Create Role',
    'route' => route('setting.role.create')
])
@endsection

@push('scripts')
    @include('setting.role.js')
@endpush