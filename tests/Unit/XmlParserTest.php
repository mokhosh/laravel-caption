<?php

use Mokhosh\LaravelCaption\Parsers\XmlCaptionParser;

it('can read xml caption files', function () {
    $caption = XmlCaptionParser::import('tests/Inputs/youtube.xml')->parse();

    expect($caption->lines()->count())->toBe(9);
});
