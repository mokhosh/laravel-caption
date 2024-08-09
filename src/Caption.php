<?php

namespace Mokhosh\LaravelCaption;

use Illuminate\Support\Collection;

class Caption
{
    protected Collection $lines;

    public function __construct()
    {
        $this->lines = collect();
    }

    public function add(Line $line)
    {
        $this->lines->push($line);
    }

    public function lines(): Collection
    {
        return $this->lines;
    }
}
