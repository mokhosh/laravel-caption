<?php

namespace Mokhosh\LaravelXmlToSrt;

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

    public function export(string $path)
    {
        $file = fopen($path, 'w');

        foreach ($this->caption->lines() as $index => $line) {
            $start = TimecodeConverter::floatToTimecode($line->start);
            $end = TimecodeConverter::floatToTimecode($line->start + $line->duration);

            $output = 
                $index + 1 . "\n" .
                $start . " --> " .
                $end . "\n" .
                $line->text . "\n\n";
                
            fwrite($file, $output);
        }

        fclose($file);
    }
}
