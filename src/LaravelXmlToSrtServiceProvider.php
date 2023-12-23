<?php

namespace Mokhosh\LaravelXmlToSrt;

use Mokhosh\LaravelXmlToSrt\Commands\LaravelXmlToSrtCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelXmlToSrtServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-xml2srt')
            ->hasConfigFile()
            ->hasCommand(LaravelXmlToSrtCommand::class);
    }
}
