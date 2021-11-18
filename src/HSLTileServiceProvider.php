<?php

namespace Kehet\HSLTile;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Spatie\Dashboard\Facades\Dashboard;

class HSLTileServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                FetchDataFromApiCommand::class,
            ]);
        }

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/dashboard-hsl-tile'),
        ], 'dashboard-my-tile-views');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'dashboard-hsl-tile');

        $this->publishes([
            __DIR__.'/../resources/css' => public_path('vendor/dashboard-hsl-tile'),
        ], 'dashboard-my-tile-views');

        Dashboard::stylesheet(asset('vendor/dashboard-hsl-tile/hsl.css'));

        Livewire::component('hsl-tile', HSLTileComponent::class);
    }
}
