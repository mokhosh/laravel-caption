<?php

namespace Mokhosh\LaravelXmlToSrt;

class XmlCaptionParser
{
    public function __construct(
        protected string $path,
    ) {}

    public function parse()
    {
        $file = file_get_contents($this->path);
        $xml = simplexml_load_string($file);
    }
}
