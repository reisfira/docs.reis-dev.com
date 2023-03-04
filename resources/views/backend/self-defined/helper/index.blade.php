@extends('layouts.master')
@section('title', 'Helper')
@section('subheader', 'Helper')
@section('breadcrumbs', Breadcrumbs::render('breadcrumbs', [], 'Helper'))

@section('content')
<div class="card">
    <div class="card-header">
        <ul class="nav nav-pills">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-number-tab" data-toggle="pill" data-target="#pills-number" type="button">Number</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-date-tab" data-toggle="pill" data-target="#pills-date" type="button">Date</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-datatable-tab" data-toggle="pill" data-target="#pills-datatable" type="button">Datatable</button>
            </li>
        </ul>
    </div>

    <div class="card-body">
        <div class="tab-content" id="tab-content">
            <div class="tab-pane fade show active" id="pills-number">
                @include('backend.self-defined.helper.tab-content.number')
            </div>
            <div class="tab-pane fade" id="pills-date">
                <pre><code>{{ file_get_contents(base_path('app/Helpers/date.php')) }}</code></pre>
            </div>
            <div class="tab-pane fade" id="pills-datatable">
                <pre><code>{{ file_get_contents(base_path('app/Helpers/datatable.php')) }}</code></pre>
            </div>
        </div>
    </div>
</div>
@endsection
