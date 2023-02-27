<div class="modal fade search-modal-template @if (isset($class)) {{ $class }} @endif" {{ isset($id) ? 'id='.$id : '' }} tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Search</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <table class="table table-bordered table-hover search-table" width="100%">
                    <thead>
                        <tr class="table-heading bg-primary text-white"></tr>
                    </thead>
                </table>
            </div>

            <div class="modal-footer">
                {!! Form::button('Close', ['class' => 'btn btn-secondary', 'data-dismiss' => 'modal']) !!}
            </div>
        </div>
    </div>
</div>
