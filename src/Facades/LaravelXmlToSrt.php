<?php

namespace Mokhosh\LaravelXmlToSrt\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Mokhosh\LaravelXmlToSrt\LaravelXmlToSrt
 */
class LaravelXmlToSrt extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Mokhosh\LaravelXmlToSrt\LaravelXmlToSrt::class;
    }
}
