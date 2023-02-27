<div class="modal fade search-modal-template @if (isset($class)) {{ $class }} @endif" {{ isset($id) ? 'id='.$id : '' }} tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Search</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                <table class="table table-bordered table-hover search-table" style="width:100%">
                    <thead>
                        <tr>
                            {{-- <th class="p-1">@include('components.form.general.text', ['name' => 'search_code', 'form_class' => 'stock-search-input column_search'])</th> --}}
                            {{-- <th class="p-1">@include('components.form.general.text', ['name' => 'search_name', 'form_class' => 'stock-search-input column_search'])</th> --}}
                        </tr>
                        <tr class="table-heading bg-primary text-white"></tr>
                    </thead>
                </table>
                <div class='m-3 row'>
                    <div class="col-6">
                        @include('transaction.transaction.components.datatable-search-column', [ 'label'=>'Left Text', 'name'=>'left_text', 'name_column'=>'left_text_column', 'array'=>[]])
                        @include('transaction.transaction.components.datatable-search-column', [ 'label'=>'Context Text', 'name'=>'context_text', 'name_column'=>'context_text_column', 'array'=>[]])
                    </div>
                    <div class="col-6">
                        <span class="btn btn-primary search-btn">Search</span>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                {!! Form::button('Close', ['class' => 'btn btn-secondary', 'data-dismiss' => 'modal']) !!}
            </div>
        </div>
    </div>
</div>
