<?php

Breadcrumbs::for('home', function ($trail) { $trail->push('Dashboard', route('home')); });

// original
Breadcrumbs::register('file-maintenance', function($breadcrumbs, $module = 'File Maintenance', $index_route = '#', $current_page = null)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push($module, $index_route);

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

// new docs routes
