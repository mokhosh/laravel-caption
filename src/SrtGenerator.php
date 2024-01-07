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

    public function export(string $path): string
    {
        return $this->generate($this->caption->lines(), $path);
    }

    public function chunk(int $every, string $folder, string $prefix = 'chunk'): Collection
    {
        $paths = [];
        $chunks = $this->caption->lines()->chunk($every);

        foreach ($chunks as $index => $chunk) {
            $path = $folder.$prefix.str_pad($index + 1, 3, '0', STR_PAD_LEFT).'.srt';

            $paths[] = $this->generate($chunk, $path);
        }

        return collect($paths);
    }

    protected function generate(Collection $lines, string $path): string
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

        return $path;
    }
}
