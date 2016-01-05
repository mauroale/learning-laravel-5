<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeNavigation();   
    }

    private function composeNavigation()
    {
        view()->composer('partials/nav', function($view)
        {
            $view->with('latest', \App\Articles::latest()->first() );
        }); 
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
