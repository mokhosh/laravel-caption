<?php

use Mokhosh\LaravelXmlToSrt\SrtGenerator;
use Mokhosh\LaravelXmlToSrt\XmlCaptionParser;

it('can read xml caption files', function () {
    $caption = XmlCaptionParser::import('tests/test.xml')->parse();

    expect($caption->lines()->count())->toBe(9);
});

it('can generate srt files', function () {
    $parser = new XmlCaptionParser('tests/test.xml');
    $caption = $parser->parse();
    $generator = new SrtGenerator($caption);
    $generator->export('tests/test.srt');

    expect('tests/test.srt')->toBeReadableFile();
});
