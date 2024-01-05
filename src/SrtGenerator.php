<?php

namespace Mokhosh\LaravelXmlToSrt;

use Illuminate\Support\Collection;

class SrtGenerator
{
    public function __construct(
        protected Caption $caption,
    ) {
    }

    public static function load(Caption $caption): static
    {
        return new static($caption);
    }

    public function export(string $path): void
    {
        $this->generate($this->caption->lines(), $path);
    }

    protected function generate(Collection $lines, string $path): void
    {
        $file = fopen($path, 'w');

        foreach ($lines as $index => $line) {
            $start = TimecodeConverter::floatToTimecode($line->start);
            $end = TimecodeConverter::floatToTimecode($line->start + $line->duration);

            $output =
                $index + 1 ."\n".
                $start.' --> '.
                $end."\n".
                $line->text."\n\n";

            fwrite($file, $output);
        }

        fclose($file);
    }
}
