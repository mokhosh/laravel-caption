<?php

namespace Mokhosh\LaravelCaption;

use Illuminate\Support\Collection;

class LaravelCaption
{
    public function xml2srt(string $input, string $output, ?int $every = null, string $prefix = 'chunk'): string|Collection
    {
        $caption = XmlCaptionParser::import($input)->parse();

        if (is_null($every)) {
            return SrtGenerator::load($caption)->export($output);
        } else {
            return SrtGenerator::load($caption)->chunk($every, $output, $prefix);
        }
    }
}
