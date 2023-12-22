<?php

namespace Mokhosh\LaravelXmlToSrt;

class XmlCaptionParser
{
    public function __construct(
        protected string $path,
    ) {}

    public function parse(): Caption
    {
        $file = file_get_contents($this->path);
        $xml = simplexml_load_string($file);
        $caption = new Caption;

        foreach ($xml->transcript as $text) {
            $caption->add(new Line(
                $text['start'],
                $text['dur'],
                $text,
            ));
        }

        return $caption;
    }
}
