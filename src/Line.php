<?php

namespace Mokhosh\LaravelXmlToSrt;

readonly class Line
{
    public function __construct(
        public float $start,
        public float $duration,
        public string $text,
    ) {
    }
}
