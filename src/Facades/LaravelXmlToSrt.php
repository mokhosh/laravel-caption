<?php

namespace Mokhosh\LaravelCaption\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string convert(string $input, string $output)
 * @method static \Illuminate\Support\Collection chunk(string $input, int $every, string $outputFolder, string $prefix)
 *
 * @see \Mokhosh\LaravelCaption\LaravelCaption
 */
class LaravelCaption extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Mokhosh\LaravelCaption\LaravelCaption::class;
    }
}
