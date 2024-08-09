<?php

namespace Mokhosh\LaravelCaption\Parsers;

use Mokhosh\LaravelCaption\Caption;
use Mokhosh\LaravelCaption\Line;

class OpenAiTranscriptionParser
{
    protected object $json;

    public function __construct(string|object $json)
    {
        if (is_string($json)) {
            $json = json_decode($json);
        }

        $this->json = $json;
    }

    public static function load(string|object $json): static
    {
        return new static($json);
    }

    public static function import(string $path): static
    {
        $json = file_get_contents($path);

        return new static($json);
    }

    public function parse(): Caption
    {
        $caption = new Caption;

        foreach ($this->json->segments as $segment) {
            $caption->add(new Line(
                floatval($segment->start),
                floatval($segment->end) - floatval($segment->start),
                trim($segment->text),
            ));
        }

        return $caption;
    }
}
