<?php

namespace Kehet\HSLTile\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Kehet\HSLTile\HSLTileServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        /*
        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Kehet\\HSLTile\\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
        */
    }

    protected function getPackageProviders($app): array
    {
        return [
            HSLTileServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');

        /*
         foreach (\Illuminate\Support\Facades\File::allFiles(__DIR__ . '/database/migrations') as $migration) {
            (include $migration->getRealPath())->up();
         }
         */
    }
}
