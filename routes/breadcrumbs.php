<?php

Breadcrumbs::for('home', function ($trail) { $trail->push('Dashboard', route('home')); });

//Masterfile
Breadcrumbs::register('cost-centre', function($breadcrumbs, $current_page = null)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Cost Centre', route('file-maintenance.cost-centre.index'));

    if (isset($current_page)) {
        $breadcrumbs->push($current_page);
    }
});

Breadcrumbs::register('chart-of-account', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Chart Of Account', route('chart-of-account.index'));
});

Breadcrumbs::register('debtor', function($breadcrumbs, $current_page = null)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Debtor', route('file-maintenance.debtor.index'));

    if (isset($current_page)) {
        $breadcrumbs->push($current_page);
    }
});

Breadcrumbs::register('creditor', function($breadcrumbs, $current_page = null)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Creditor', route('file-maintenance.creditor.index'));

    if (isset($current_page)) {
        $breadcrumbs->push($current_page);
    }
});

Breadcrumbs::register('file-maintenance', function($breadcrumbs, $module = 'File Maintenance', $index_route = '#', $current_page = null)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push($module, $index_route);

    if (isset($current_page)) {
        $breadcrumbs->push($current_page);
    }
});

Breadcrumbs::register('transaction', function($breadcrumbs, $module = 'Transaction', $index_route = '#', $current_page = null)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push($module, $index_route);

    if (isset($current_page)) {
        $breadcrumbs->push($current_page);
    }
});

Breadcrumbs::register('invoice', function($breadcrumbs, $current_page = null)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Invoice', route('transaction.invoice.index'));

    if (isset($current_page)) {
        $breadcrumbs->push($current_page);
    }
});

Breadcrumbs::register('setting', function($breadcrumbs, $module = 'Setting', $index_route = '#', $current_page = null)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push($module, $index_route);

    if (isset($current_page)) {
        $breadcrumbs->push($current_page);
    }
});
