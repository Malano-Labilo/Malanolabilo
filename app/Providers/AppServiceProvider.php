<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
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
    {
        
        if(env('APP_ENV') === 'production') {
            // Force HTTPS in production environment
            URL::forceScheme('https');
        }
        //Jika ada yang menggunakan lazy loading akan error
        Model::preventLazyLoading();

        //Paginate View Penuh/Lengkap
        Paginator::defaultView('vendor.pagination.paginate');

        //Paginate View Simple
        Paginator::defaultSimpleView('vendor.pagination.simple-paginate');

        //Untuk konfigurasi di hosting infinityfree
    //     $this->app->bind('path.public', function() {
    //     return base_path();
    //     });

    }
}
