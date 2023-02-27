<div class="card card-primary">
    <div class="card-header">ITEM LISTING</div>
    <div class="card-body">
        <table class="table table-sm table-borderless" id="listing-datatable" data-route="{{ route('datatable.invoice.content', $resource->id) }}">
            @include('transaction.invoice.components.table.thead')
            @include('transaction.invoice.components.table.tfoot')
        </table>
    </div>
</div>

<div class="card card-primary">
    <div class="card-header">ITEM ENTRY </div>
    <div class="card-body p-0">
        <table class="table table-sm table-bordered" id="listing-datatable">
            @include('transaction.invoice.components.table.thead')
            @include('transaction.invoice.components.table.entry')
        </table>
    </div>
</div>