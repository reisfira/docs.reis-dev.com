<div class="modal fade chart-of-account-ledger-modal-template" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Genral Ledger</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => '#', 'method' => 'POST']) !!}
                    @method('POST')

                    @include('components.form.general.text-w-label', [
                        'name' => 'ledger_account_code',
                        'label' => 'Account Code',
                        'form_class' => 'account_code'
                    ])

                    @include('components.form.general.select2-w-label-uninitialized', [
                        'array' => $cost_centre,
                        'name' => 'ledger_ccentre_code',
                        'label' => 'Cost Centre',
                        'form_class' => 'ccentre_code',
                        'select2_class' => 'select2-modal',
                    ])

                    @include('components.form.general.text-w-label', [
                        'name' => 'ledger_description',
                        'label' => 'Description',
                        'form_class' => 'description'
                    ])

                    @include('components.form.general.text-w-label', [
                        'name' => 'ledger_opening',
                        'label' => 'Opening',
                        'form_class' => 'opening inputmask-decimal-2'
                    ])

                    @include('components.form.general.text-w-label', [
                        'name' => 'ledger_last_year_balance',
                        'label' => 'Last Year Balance',
                        'form_class' => 'last_year_balance inputmask-decimal-2'
                    ])

                    {!! Form::hidden('ledger_chart_of_account_code', '', ['class'=>'ledger_chart_of_account_code']) !!}
                    {!! Form::hidden('ledger_chart_of_account_sub_code', '', ['class'=>'ledger_chart_of_account_sub_code']) !!}

                    <div class="form-group row">
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3 delete-section d-none">
                            <a href="{{ route('chart-of-account.ledger.destroy', 'ID') }}" data-confirm="Confirm delete this record?"
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
