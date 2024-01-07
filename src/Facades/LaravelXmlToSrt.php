<?php

namespace Mokhosh\LaravelXmlToSrt\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string convert(string $input, string $output)
 * @method static \Illuminate\Support\Collection chunk(string $input, int $every, string $outputFolder, string $prefix)
 *
 * @see \Mokhosh\LaravelXmlToSrt\LaravelXmlToSrt
 */
class LaravelXmlToSrt extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Mokhosh\LaravelXmlToSrt\LaravelXmlToSrt::class;
    }
}
