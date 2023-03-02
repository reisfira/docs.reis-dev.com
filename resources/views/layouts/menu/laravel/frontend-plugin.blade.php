<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-diamond"></i>
        <p>
            FRONTEND
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>

    <ul class="nav nav-treeview">
        @include('layouts.menu.laravel.frontend.self-defined')
        @include('layouts.menu.laravel.frontend.adminlte')
        @include('layouts.menu.laravel.frontend.jquery')
        @include('layouts.menu.laravel.frontend.bootstrap')
        @include('layouts.menu.laravel.frontend.select2')
        @include('layouts.menu.laravel.frontend.inputmask')
        @include('layouts.menu.laravel.frontend.notification')
        @include('layouts.menu.laravel.frontend.datatable')
        @include('layouts.menu.laravel.frontend.chartjs')
    </ul>
</li>
{{--
    "@fortawesome/fontawesome-free": "^6.2.0",
    "@ttskch/select2-bootstrap4-theme": "^1.5.2",
    "admin-lte": "3.1",
    "bootstrap-datepicker": "^1.9.0",
    "bootstrap4-toggle": "^3.6.1",
    "chart.js": "^4.2.1",
    "chartjs-plugin-datalabels": "^2.2.0",
    "datatables.net-bs4": "^1.13.1",
    "icheck": "^1.0.2",
    "icheck-bootstrap": "^3.0.1",
    "inputmask": "^5.0.7",
    "jquery-ujs": "^1.2.3",
    "select2": "^4.1.0-rc.0",
    "sweetalert2": "^11.7.1",
    "toastr": "^2.1.4"
--}}