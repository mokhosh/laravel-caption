<?php

namespace Mokhosh\LaravelXmlToSrt;

class LaravelXmlToSrt
{
    public function convert(string $input, string $output)
    {
        $caption = XmlCaptionParser::import($input)->parse();
        SrtGenerator::load($caption)->export($output);
    }
}
