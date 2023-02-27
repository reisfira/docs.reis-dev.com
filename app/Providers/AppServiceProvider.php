<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * when on the index.blade.php pages, often times, there are datatables,
         * in file-maintenance, almost everything is only code, description,
         * > so we just reuse the variable from here to reduce repeating codes
         * */
        view()->composer(['*.index'], function($view) {
            $data = [];
            $data['_search_columns_array'] = config('kusimi.datatable-search-filters.default');
            $data['_search_using_default'] = true;

            $view->with($data);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
