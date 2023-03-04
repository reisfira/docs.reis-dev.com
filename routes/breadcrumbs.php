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
Breadcrumbs::register('frontend', function($breadcrumbs, $module = 'Setting', $index_route = '#', $current_page = null)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push($module, $index_route);

    if (isset($current_page)) {
        $breadcrumbs->push($current_page);
    }
});

// new docs routes
Breadcrumbs::register('breadcrumbs', function($breadcrumbs, $module_routes = [], $current_page = null)
{
    $breadcrumbs->parent('home');

    if (!empty($module_routes)) {
        foreach ($module_routes as $module => $route) {
            $breadcrumbs->push($module, $route);
        }
    }

    if (isset($current_page)) {
        $breadcrumbs->push($current_page);
    }
});
