<?php

namespace Mokhosh\LaravelXmlToSrt;

class SrtGenerator
{
    public function __construct(
        protected Caption $caption,
    ) {
    }

    public function export(string $path)
    {
        $file = fopen($path, 'w');

        foreach ($this->caption->lines() as $index => $line) {
            $output =
                $index + 1 ."\n".
                $line->start.' --> '.
                $line->duration."\n".
                $line->text."\n\n";

            fwrite($file, $output);
        }

        fclose($file);
    }
}
