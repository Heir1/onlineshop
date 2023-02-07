<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Toplevelcategory;
use App\Models\Middlelevelcategory;
use App\Models\Endlevelcategory;

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
        //
        $toplevelcategories = Toplevelcategory::get();
        $middlelevelcategories = Middlelevelcategory::get();
        $endlevelcategories = Endlevelcategory::get();

        View::share('toplevelcategories', $toplevelcategories);
        View::share("middlelevelcategories",$middlelevelcategories);
        View::share("endlevelcategories",$endlevelcategories);

    }
}
