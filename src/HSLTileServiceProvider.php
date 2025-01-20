<?php

namespace Kehet\HSLTile;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class HSLTileServiceProvider extends PackageServiceProvider
{

    public function configurePackage(Package $package): void
    {
        $package
            ->name('dashboard-hsl-tile')
            ->hasViews()
            ->hasCommand(FetchDataFromApiCommand::class);

        if (!$this->app->runningInConsole()) {
            \Livewire\Livewire::component('hsl-tile', HSLTileComponent::class);
        }
    }

}
