@extends('layouts.master')
@section('title', 'Frontend - Select2')
@section('subheader', 'Select2')
@section('breadcrumbs', Breadcrumbs::render('frontend', 'Frontend Plugin - Select2'))

@section('content')
<div class="card card-primary">
    <div class="card-header">General</div>
    <div class="card-body">
        @include('components.form.general.select2-w-label', ['name' => 'text_2', 'label' => 'Label Text 2', 'value' => 'Text 2', 'array' => [] ])
    </div>
</div>

<div class="card card-primary">
    <div class="card-body">
        {{-- <img src="{{ asset('codesnap/select2/how-it-works.png') }}" alt="Select2 example" width="100%"> --}}
        <pre><span class="text-purple">components.form.general.select2-w-label</span>
            <code class="language-php">{!! $sample !!}</code>
        </pre>

        <pre>Sample usage:
            <code>&#64;include('components.form.general.select2-w-label', ['name' => 'text_2', 'label' => 'Label Text 2', 'value' => 'Text 2', 'array' => [] ])</code>
        </pre>
    </div>
</div>
@endsection

@push('scripts')
    @include('frontend.plugin.select2.js')
@endpush