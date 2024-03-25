<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\user\UserRepositoryInterFace;
use App\Repositories\user\UserRepository;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
