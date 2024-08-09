<?php

namespace Mokhosh\LaravelCaption;

readonly class Line
{
    public function __construct(
        public float $start,
        public float $duration,
        public string $text,
    ) {
    }
}
