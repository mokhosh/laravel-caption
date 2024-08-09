<?php

namespace Mokhosh\LaravelCaption\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Mokhosh\LaravelCaption\LaravelCaptionServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Mokhosh\\LaravelCaption\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelCaptionServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-xml2srt_table.php.stub';
        $migration->up();
        */
    }
}
