<?php

namespace Mokhosh\LaravelCaption\Facades;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;

/**
 * @method static string|Collection<int, string> xml2srt(string $input, string $output, ?int $every = null, string $prefix = 'chunk')
 *
 * @see \Mokhosh\LaravelCaption\LaravelCaption
 */
class LaravelCaption extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Mokhosh\LaravelCaption\LaravelCaption::class;
    }
}
