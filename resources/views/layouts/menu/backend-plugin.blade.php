<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon far fa-square"></i>
        <p>
            BACKEND PLUGIN
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>

    <ul class="nav nav-treeview">
        @include('layouts.menu.backend.pdf')
        @include('layouts.menu.backend.breadcrumbs')
        @include('layouts.menu.backend.fortify')
        @include('layouts.menu.backend.permission')
    </ul>
</li>
{{--
    "php": "^7.3|^8.0",
    "barryvdh/laravel-snappy": "^1.0",
    "davejamesmiller/laravel-breadcrumbs": "^5.3",
    "fruitcake/laravel-cors": "^2.0",
    "geekcom/phpjasper": "^3.3",
    "guzzlehttp/guzzle": "^7.0.1",
    "laravel/fortify": "^1.13",
    "laravel/framework": "^8.75",
    "laravel/sanctum": "^2.11",
    "laravel/tinker": "^2.5",
    "laravelcollective/html": "^6.3",
    "spatie/laravel-permission": "^5.9",
    "wemersonjanuario/wkhtmltopdf-windows": "0.12.2.3"
--}}