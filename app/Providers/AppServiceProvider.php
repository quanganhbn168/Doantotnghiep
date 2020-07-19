<?php

namespace App\Providers;
use View;
use Illuminate\Support\ServiceProvider;
use App\Models\Tenderer;
use App\Models\Contractor;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function($view) {
            $count_tenderer = Tenderer::whereNull('approved_at')->count();
            $count_contractor = Contractor::whereNull('approved_at')->count();
            $view->with(['count_tenderer'=>$count_tenderer,'count_contractor'=>$count_contractor]);
        });
    }
}
