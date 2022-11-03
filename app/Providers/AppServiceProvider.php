<?php

namespace App\Providers;

use Livewire\Component;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Component::macro('notify', function ($message) {
            // $this will refer to the component class
            // not to the AppServiceProvider
            $this->dispatchBrowserEvent('notify', $message);
        });
    }
}
