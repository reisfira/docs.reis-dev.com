<div class="row">
    <div class="col-lg-7">
        <div class="card card-primary">
            <div class="card-header">
                AGING
            </div>
            <div class="card-body">
                <canvas id="aging-chart" width="400" height="150"></canvas>
            </div>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="card">
            <div class="card-header bg-white p-1">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-toggle="pill" data-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                            Opening Bill
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-toggle="pill" data-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                            Opening Payment
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-toggle="pill" data-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
                            Post Dated Cheque
                        </button>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <table class="table table-striped table-bordered" id="opening-bill-datatable">
                            <thead class="bg-primary text-white">
                                <th width="5%">#</th>
                                <th width="35%">Opening Bill</th>
                                <th width="20%">Date</th>
                                <th width="20%">Debit</th>
                                <th width="20%">Credit</th>
                            </thead>
                            <tbody>
                                @foreach ($opening_bills as $i => $opening_bill)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $opening_bill->doc_no }}</td>
                                        <td>{{ $opening_bill->date_dmy }}</td>
                                        <td>{{ $opening_bill->debit }}</td>
                                        <td>{{ $opening_bill->credit }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <table class="table table-striped table-bordered" id="opening-payment-datatable">
                            <thead class="bg-primary text-white">
                                <th width="5%">#</th>
                                <th width="35%">Opening Payment</th>
                                <th width="20%">Date</th>
                                <th width="20%">Debit</th>
                                <th width="20%">Credit</th>
                            </thead>
                            <tbody>
                                @foreach ($opening_payments as $i => $opening_payment)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $opening_payment->doc_no }}</td>
                                        <td>{{ $opening_payment->date_dmy }}</td>
                                        <td>{{ $opening_payment->debit }}</td>
                                        <td>{{ $opening_payment->credit }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        PDC
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
