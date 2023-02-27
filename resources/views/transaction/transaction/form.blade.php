<div class="card card-primary">
    <div class="card-header pointer">FORM</div>
    <div class="card-body">
        <div class="row col-12">
            <div class="col-4">
                @include('components.form.general.select2-w-label', [ 'name' => 'doc_type', 'label' => 'Doc Type', 'form_class' => 'doc_type', 'array'=>$doc_type, 'value'=>isset($resource->doc_type)?$resource->doc_type:'' ])
                {{-- @include('components.form.general.text-w-label', [ 'name' => 'doc_type', 'label' => 'Doc Type', 'form_class' => 'doc_type', 'value' => isset($resource->doc_type)?$resource->doc_type:'' ]) --}}
                @include('components.form.special.doc-no', [ 'name' => 'doc_no', 'label' => 'Document No.', 'narrow_gutter' => true ])
                @include('components.form.general.text-w-label', [ 'name' => 'reference_no', 'label' => 'Reference No', 'value' => isset($resource->reference_no)?$resource->reference_no:'' ])
                
            </div>
            <div class="col-4">
                @include('components.form.general.text-w-label', [ 'name' => 'batch_no', 'label' => 'Batch No', 'value' => isset($resource->batch_no)?$resource->batch_no:'' ])
                @include('components.form.general.date-w-label', [ 'name' => 'term', 'label' => 'Term', 'value' => isset($resource->term)?$resource->term:'' ])
                @include('components.form.general.date-w-label', [ 'name' => 'tax_date', 'label' => 'Tax Date', 'value' => isset($resource->tax_date)?$resource->tax_date_dmy:'' ])

            </div>
            <div class="col-4">
                @include('components.form.general.text-w-label', [ 'name' => 'debit_display', 'form_class' => 'debit_display inputmask-decimal-2 text-right', 'label' => 'Debit', 'extras' => 'readonly', 'value' => isset($total_debit)?$total_debit:0.00 ])
                @include('components.form.general.text-w-label', [ 'name' => 'credit_display', 'form_class' => 'credit_display inputmask-decimal-2 text-right', 'label' => 'Credit', 'extras' => 'readonly', 'value' => isset($total_credit)?$total_credit:0.00 ])
                @include('components.form.general.text-w-label', [ 'name' => 'difference_display', 'form_class' => 'difference inputmask-decimal-2 text-right', 'label' => 'Difference', 'extras' => 'readonly', 'value' => isset($difference)?$difference:0.00 ])

            </div>
        </div>
        
        {!! Form::hidden('id', null, ['class' => 'id']) !!}
    </div>
</div>
<div class="card card-primary">
    <div class="card-header">ITEM LISTING</div>
    <div class="card-body">
        <table class="table table-sm table-striped" width="100%" id="listing-datatable" data-route="{{ route('datatable.transaction.content') }}">
            @include('transaction.transaction.components.table.thead')
        </table>
    </div>
</div>

<div class="card card-primary">
    <div class="card-header">Entry Form</div>
    <div class="card-body filter-form">
        <table class="table table-sm table-bordered entry-form-table" width="100%" style="table-layout: fixed">
            @include('transaction.transaction.components.table.thead')
            @include('transaction.transaction.components.table.entry')
        </table>
    </div>
</div>