<?php

use Mokhosh\LaravelXmlToSrt\SrtGenerator;
use Mokhosh\LaravelXmlToSrt\XmlCaptionParser;

it('can read xml caption files', function () {
    $caption = XmlCaptionParser::import('tests/test.xml')->parse();

    expect($caption->lines()->count())->toBe(9);
});

it('can generate srt files', function () {
    $caption = XmlCaptionParser::import('tests/test.xml')->parse();
    SrtGenerator::load($caption)->export('tests/test.srt');

    expect('tests/test.srt')->toBeReadableFile();
});

it('can chunk xml to srt files', function () {
    $caption = XmlCaptionParser::import('tests/test.xml')->parse();
    SrtGenerator::load($caption)->chunk(4, 'tests/');

    expect('tests/chunk001.srt')->toBeReadableFile();
    expect('tests/chunk002.srt')->toBeReadableFile();
    expect('tests/chunk003.srt')->toBeReadableFile();
});
