{{--
    data passed here from the controllers are:
    - $paidBills : array of bills (from SQL View: view_bills)
    - $otherBills : array of bills (from SQL View: view_bills)
    - item : Receipt/Payment Voucher
--}}
@php $appliedAmount = 0; @endphp

<div class="card card-primary">
    <div class="card-header">ITEM LISTING</div>
        <div class="card-body">
        
            <div class="table-responsive" id="outstandings-table">
                <table class="table table-sm table-bordered" id="vouchers-table">
                    <thead>
                        <tr class="bg-secondary text-white">
                            <th width="5%" class="text-center">#</th>
                            <th width="10%">Outstanding Bill</th>
                            <th width="5%">Date</th>
                            <th width="20%">Description</th>
                            <th width="8%" class="text-right">Bill Amt</th>
                            <th width="8%" class="text-right">Paid Amt</th>
                            <th width="8%" class="text-right">Outstanding Amt</th>
                            <th width="8%" class="text-right">Applied Amt</th>
                        </tr>
                    </thead>
                    <tbody id="table-form-tbody">
                        @include('transaction.receipt-voucher.components.table.row-template')
                        @include('transaction.receipt-voucher.components.table.row-paid-bills')
                        @include('transaction.receipt-voucher.components.table.row-other-bills')
                    </tbody>
                    <tfoot>
                        <tr class="bg-info text-white">
                            <td colspan="4" class="text-right">TOTALS</td>
                            <td class="text-right total-bill-amount"></td>
                            <td class="text-right total-paid-amount"></td>
                            <td class="text-right total-outstanding-amount"></td>
                            <td class="text-right total-applied-amount"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
