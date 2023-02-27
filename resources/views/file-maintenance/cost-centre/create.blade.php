@extends('layouts.master')
@section('title', 'Cost Centre')
@section('subheader', 'Cost Centre')
@section('breadcrumbs', Breadcrumbs::render('cost-centre', 'Create'))

@section('content')
    {!! Form::open(['url' => route('file-maintenance.cost-centre.store'), 'method' => 'POST']) !!}
    @csrf
        <div class="form-group row">
            <div class="col-10"></div>
            <div class="col-2">
                <button type="submit" class="btn btn-success form-control btn-submit">
                    <i class="fas fa-arrow-right pr-2"></i>
                    Submit
                </button>
            </div>
        </div>
        @include('file-maintenance.cost-centre.content')
    {!! Form::close() !!}
@endsection

@push('scripts')
    @include('file-maintenance.cost-centre.js')
@endpush
