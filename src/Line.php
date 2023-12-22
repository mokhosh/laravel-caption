<?php

namespace Mokhosh\LaravelXmlToSrt;

use Illuminate\Support\Collection;

readonly class Line
{
    public function __construct(
        public float $start,
        public float $duration,
        public string $text,
    ) {}
}
