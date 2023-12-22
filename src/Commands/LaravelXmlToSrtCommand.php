<?php

namespace Mokhosh\LaravelXmlToSrt\Commands;

use Illuminate\Console\Command;

class LaravelXmlToSrtCommand extends Command
{
    public $signature = 'laravel-xml2srt';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
