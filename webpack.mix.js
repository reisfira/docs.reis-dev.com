const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

// datatables
mix.copy('node_modules/datatables.net/js/jquery.dataTables.min.js', 'public/js/jquery.datatables.min.js');
mix.copy('node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js', 'public/js/datatables.bootstrap4.min.js');
mix.copy('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css', 'public/css/datatables.bootstrap4.min.css');

// select2
mix.copy('node_modules/select2/dist/css/select2.min.css', 'public/css/select2.min.css');
mix.copy('node_modules/select2/dist/js/select2.min.js', 'public/js/select2.min.js');
mix.copy('node_modules/@ttskch/select2-bootstrap4-theme/dist/select2-bootstrap4.min.css', 'public/css/select2-bootstrap4.min.css');

mix.copy('node_modules/jquery/dist/jquery.min.js', 'public/js/jquery.min.js');
mix.copy('node_modules/moment/min/locales.min.js', 'public/js/locales.min.js')
mix.copy('node_modules/moment/min/moment.min.js', 'public/js/moment.min.js')

// jquery ui - for sortable
mix.copy('node_modules/jquery-ui-dist/jquery-ui.theme.min.css', 'public/css/jquery-ui.theme.min.css')
mix.copy('node_modules/jquery-ui-dist/jquery-ui.min.css', 'public/css/jquery-ui.min.css')
mix.copy('node_modules/jquery-ui-dist/jquery-ui.min.js', 'public/js/jquery-ui.min.js')

// bootstrap datepicker
mix.copy('node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css', 'public/css/bootstrap-datepicker.min.css')
mix.copy('node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js', 'public/js/bootstrap-datepicker.min.js')
mix.copy('node_modules/admin-lte/plugins/daterangepicker/daterangepicker.css', 'public/css/daterangepicker.css')
mix.copy('node_modules/admin-lte/plugins/daterangepicker/daterangepicker.js', 'public/js/daterangepicker.js')

mix.copy('node_modules/admin-lte/plugins/inputmask/jquery.inputmask.min.js', 'public/js/jquery.inputmask.min.js')
mix.copy('node_modules/admin-lte/plugins/inputmask/inputmask.min.js', 'public/js/inputmask.min.js')
mix.copy('node_modules/admin-lte/plugins/inputmask/bindings/inputmask.binding.js', 'public/js/inputmask.binding.js')

// in-app notifications
mix.copy('node_modules/toastr/build/toastr.min.css', 'public/css/toastr.min.css')
mix.copy('node_modules/toastr/build/toastr.min.js', 'public/js/toastr.min.js')
mix.copy('node_modules/sweetalert2/dist/sweetalert2.min.js', 'public/js/sweetalert.min.js')
mix.copy('node_modules/sweetalert2/dist/sweetalert2.min.css', 'public/css/sweetalert.min.css')

// datatables
mix.copy('node_modules/admin-lte/plugins/datatables/jquery.dataTables.min.js', 'public/js/datatables.min.js')
mix.copy('node_modules/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js', 'public/js/datatables.bootstrap4.min.js')
mix.copy('node_modules/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css', 'public/css/datatables.bootstrap4.min.css');

// bootstrap toggles
mix.copy('node_modules/bootstrap4-toggle/css/bootstrap4-toggle.min.css', 'public/css/bootstrap4-toggle.min.css')
mix.copy('node_modules/bootstrap4-toggle/js/bootstrap4-toggle.min.js', 'public/js/bootstrap4-toggle.min.js')

// chart js
mix.copy('node_modules/chart.js/dist/chart.js', 'public/js/chart.js')
mix.copy('node_modules/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js', 'public/js/chartjs-plugin-datalabels.min.js')


mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();