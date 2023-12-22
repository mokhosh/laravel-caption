<?php

namespace Mokhosh\LaravelXmlToSrt;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Mokhosh\LaravelXmlToSrt\Commands\LaravelXmlToSrtCommand;

class LaravelXmlToSrtServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-xml2srt')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-xml2srt_table')
            ->hasCommand(LaravelXmlToSrtCommand::class);
    }
}
