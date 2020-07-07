<?php

namespace App\Providers;

use App\Libs\IStorage;
use App\Models\Claim;
use App\Observers\ClaimObserver;
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
        $this->app->bind(IStorage::class,function($app){
            $result = [];
            foreach (config('storage') as $class) {
                $result[] = new $class();
            }
    
            return collect($result);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Claim::observe(ClaimObserver::class);
    }
}
