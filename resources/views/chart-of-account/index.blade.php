@extends('layouts.master')
@section('title', 'Chart of Account')
@section('subheader', 'Chart of Account')
@section('breadcrumbs', Breadcrumbs::render('chart-of-account'))

@section('content')
<div class="sys-params"
    data-chart-of-account-fetch="{{ route('chart-of-account.fetch', 'ID') }}"
    data-chart-of-account-sub-fetch="{{ route('chart-of-account.subheading.fetch', 'ID') }}"
    data-chart-of-account-sub-store="{{ route('chart-of-account.subheading.store') }}"
    data-general-ledger-fetch="{{ route('chart-of-account.ledger.fetch', 'ID') }}"
    data-chart-of-account-ledger-store="{{ route('chart-of-account.ledger.store') }}">
</div>

<div class="form-group row">
    <div class="col-md-2">
        <div class="dropdown">
            <button class="btn btn-secondary form-control" type="button" data-toggle="dropdown">
                <i class="fas fa-print pr-2"></i>
                Print
                <i class="fas fa-caret-down pt-1 float-right"></i>
            </button>
            <div class="dropdown-menu">
                <button type="button" class="dropdown-item report" data-form-class=".chart-of-account-full" data-form-title="Chart of Account">
                    <i class="fas fa-folder-tree pr-2"></i>
                    Chart of Account & General Ledgers Listing
                </button>

                <button type="button" class="dropdown-item report" data-form-class=".chart-of-account-list" data-form-title="Chart of Account Listing">
                    <i class="fas fa-list pr-2"></i>
                    Chart of Account Listing
                </button>
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>
    <div class="col-md-3"></div>
    <div class="col-md-3">
        <button type="button" class="btn btn-primary btn-new-chart-of-account form-control"
            data-route="{{ route('chart-of-account.store') }}" data-method="POST">
            <i class="fas fa-plus pr-2"></i>
            New Chart of Account
        </button>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-bordered bg-white" id="chart-of-account-table">
        <thead>
            <tr class="bg-secondary text-white">
                <th width="10%">Account No.</th>
                <th width="30%">Description</th>
                <th width="10%">Opening</th>
                <th width="10%">Last Year Bal.</th>
                <th width="5%">Currency</th>
                <th colspan="2" width="10%"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($chart_of_accounts as $chart_of_account)
                @include('chart-of-account.heading')

                @foreach ($chart_of_account->ledgers as $ledger)
                    @include('chart-of-account.ledger')
                @endforeach

                @foreach ($chart_of_account->subheadings as $subheading)
                    @include('chart-of-account.subheading')

                    @foreach ($subheading->ledgers as $ledger)
                        @include('chart-of-account.ledger')
                    @endforeach
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('modals')
    @include('chart-of-account.heading-modal')
    @include('chart-of-account.subheading-modal')
    @include('chart-of-account.ledger-modal')

    @include('components.modal.reporting')

    <div class="modal-form-templates d-none">
        @include('file-maintenance.index-print-modal', ['template_class' => 'chart-of-account-full',  'route' => route('chart-of-account.print.full'), 'types' => [ 'json', 'pdf', 'xlsx' ] ])
        @include('file-maintenance.index-print-modal', ['template_class' => 'chart-of-account-list',  'route' => route('chart-of-account.print.list'), 'types' => [ 'json', 'pdf', 'xlsx' ] ])
    </div>
@endsection

@push('scripts')
    @include('chart-of-account.heading-js')
    @include('chart-of-account.subheading-js')
    @include('chart-of-account.ledger-js')
    @include('reporting.index-js')
@endpush
