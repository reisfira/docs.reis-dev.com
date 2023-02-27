<?php

return [
    'form' => [
        'flash' => [
            'new' => 'Successfully created new ',
            'update' => 'Successfully updated ',
            'delete' => 'Successfully deleted ',
        ],
    ],

    'period' => [
        'Today',
        'Yesterday',
        'Last 3 days',
        'Last Week',
        'Last Month',
        'Last 6 Months',
        'Last 12 Months',
    ],

    'months' => [
        'January' => 'January',
        'Febrary' => 'Febrary',
        'March' => 'March',
        'April' => 'April',
        'May' => 'May',
        'June' => 'June',
        'July' => 'July',
        'August' => 'August',
        'September' => 'September',
        'October' => 'October',
        'November' => 'November',
        'December' => 'December',
    ],

    'chart-of-account-classifications' => [
        // Balance Sheet Accounts
        'FA' => '(FA) Fixed Assets',
        'CA' => '(CA) Current Assets',
        'OA' => '(OA) Other Assets',
        'CL' => '(CL) Current Liabilities',
        'LL' => '(LL) Long Term Liabilities',
        'OL' => '(OL) Other Liabilities',
        'SF' => '(SF) Shareholder / Proprietor Funds',
        // Profit & Loss Accounts
        'IN' => '(IN) Sales / Income / Revenue',
        'CI' => '(CI) Cost of Income',
        'EX' => '(EX) Expenses',
    ],

    'chart-of-account-types' => [
        'Balance Sheet' => 'Balance Sheet',
        'Profit-Loss' => 'Profit-Loss',
    ],

    'print-formats' => [
        [
            'id' => 'print-type-pdf',
            'label' => 'PDF',
            'value' => 'pdf',
            'checked' => true,
        ],[
            'id' => 'print-type-excel',
            'label' => 'MS Excel',
            'value' => 'xlsx',
            'checked' => false,
        ],[
            'id' => 'print-type-word',
            'label' => 'MS Word',
            'value' => 'docs',
            'checked' => false,
        ],[
            'id' => 'print-type-json',
            'label' => 'Raw Data',
            'value' => 'json',
            'checked' => false,
        ]
    ],

    'tax-types' => [
        'SST' => 'SST',
        'GST' => 'GST',
    ],

    'datatable-search-filters' => [
        'default' => [
            'code' => 'Code',
            'description' => 'Description',
        ],
        'dbcr' => [
            'full_code' => 'A/Code + C/Code',
            'account_code' => 'Account Code Only',
            'ccentre_code' => 'Cost Centre Code Only',
            'name' => 'Name',
            'addr1' => 'Address 1',
            'addr2' => 'Address 2',
            'addr3' => 'Address 3',
            'addr4' => 'Address 4',
            'tel_no' => 'Tel No.',
            'fax_no' => 'Fax No.',
            'email' => 'Email',
            'contact_person' => 'Contact Person',
            'area_code' => 'Area Code',
            'salesman_code' => 'Salesman Code',
            'salesman name' => 'Salesman Name',
            'credit_term' => 'Credit Term',
            'credit_limit' => 'Credit Limit',
            'gst_no' => 'GST No.',
            'gst_code' => 'GST Code',
            'reference' => 'Reference',
            'mark' => 'Mark',
        ],
        'user' => [
            'email' => 'Email',
            'name' => 'Name',
        ],
    ],

];
