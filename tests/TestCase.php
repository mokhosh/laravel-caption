<?php

namespace Mokhosh\LaravelCaption\Tests;

use Mokhosh\LaravelCaption\LaravelCaptionServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            LaravelCaptionServiceProvider::class,
        ];
    }
}
