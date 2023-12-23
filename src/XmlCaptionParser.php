<?php

namespace Mokhosh\LaravelXmlToSrt;

use SimpleXMLElement;

class XmlCaptionParser
{
    protected SimpleXMLElement $xml;

    public function __construct(string $xml)
    {
        $this->xml = simplexml_load_string($xml);
    }

    public static function import(string $path): static
    {
        $xml = file_get_contents($path);

        return new static($xml);
    }

    public function parse(): Caption
    {
        $caption = new Caption;

        foreach ($this->xml->text as $text) {
            $caption->add(new Line(
                floatval($text['start']),
                floatval($text['dur']),
                $text,
            ));
        }

        return $caption;
    }
}
