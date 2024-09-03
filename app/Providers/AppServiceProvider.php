<?php

namespace App\Providers;

use App\Models\courriers;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {     //  partage de la variable $courriers globalement
        $courriers = courriers::all(); // ou ce qui est approprié
        view()->share('courriers', $courriers);

        view()->composer('user.index', function ($view) {

            $view->with('courriers', courriers::paginate(10));
            });
    }
}
