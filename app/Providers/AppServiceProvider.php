<?php

namespace App\Providers;

use App\IStorage;
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
        //
    }
}
