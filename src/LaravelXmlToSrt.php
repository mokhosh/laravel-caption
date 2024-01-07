<?php

namespace Mokhosh\LaravelXmlToSrt;

use Illuminate\Support\Collection;

class LaravelXmlToSrt
{
    public function convert(string $input, string $output): string
    {
        $caption = XmlCaptionParser::import($input)->parse();

        return SrtGenerator::load($caption)->export($output);
    }

    public function chunk(string $input, int $every, string $outputFolder, string $prefix): Collection
    {
        $caption = XmlCaptionParser::import($input)->parse();

        return SrtGenerator::load($caption)->chunk($every, $outputFolder, $prefix);
    }
}
