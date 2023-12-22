<?php

namespace Mokhosh\LaravelXmlToSrt;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Mokhosh\LaravelXmlToSrt\Commands\LaravelXmlToSrtCommand;

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
