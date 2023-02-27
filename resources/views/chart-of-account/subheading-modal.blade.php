<div class="modal fade sub-chart-of-account-modal-template" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sub Chart of Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => '#', 'method' => 'POST']) !!}
                    @method('POST')

                    @include('components.form.general.text-w-label', [
                        'name' => 'subheading_description',
                        'label' => 'Description',
                        'form_class' => 'description'
                    ])
                    
                    {!! Form::hidden('subheading_chart_of_account_code', '', ['class'=>'subheading_chart_of_account_code']) !!}

                    <div class="form-group row">
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3 delete-section d-none">
                            <a href="{{ route('chart-of-account.subheading.destroy', 'ID') }}" data-confirm="Confirm delete this record?"
                                class="btn btn-danger btn-delete form-control" data-method="DELETE">
                                Delete
                            </a>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
