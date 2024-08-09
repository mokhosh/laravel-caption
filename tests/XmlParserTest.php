<?php

use Mokhosh\LaravelCaption\Parsers\XmlCaptionParser;

it('can read xml caption files', function () {
    $caption = XmlCaptionParser::import('tests/test.xml')->parse();

    expect($caption->lines()->count())->toBe(9);
});
