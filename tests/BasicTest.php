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

    unlink('tests/test.srt');
});

it('can chunk xml to srt files', function () {
    $caption = XmlCaptionParser::import('tests/test.xml')->parse();
    SrtGenerator::load($caption)->chunk(4, 'tests/');

    expect('tests/chunk001.srt')->toBeReadableFile();
    expect('tests/chunk002.srt')->toBeReadableFile();
    expect('tests/chunk003.srt')->toBeReadableFile();

    unlink('tests/chunk001.srt');
    unlink('tests/chunk002.srt');
    unlink('tests/chunk003.srt');
});

it('returns srt filename', function () {
    $caption = XmlCaptionParser::import('tests/test.xml')->parse();
    $output = SrtGenerator::load($caption)->export('tests/test.srt');

    expect($output)->toBeReadableFile();

    unlink($output);
});

it('returns chunk filenames', function () {
    $caption = XmlCaptionParser::import('tests/test.xml')->parse();
    $chunks = SrtGenerator::load($caption)->chunk(4, 'tests/');

    foreach ($chunks as $chunk) {
        expect($chunk)->toBeReadableFile();

        unlink($chunk);
    }
});
