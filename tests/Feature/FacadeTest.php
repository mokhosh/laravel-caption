<?php

use Mokhosh\LaravelCaption\Facades\LaravelCaption;

it('can convert xml files to srt format', function () {
    LaravelCaption::xml2srt(
        input: 'tests/Inputs/youtube.xml',
        output: 'tests/test.srt',
    );

    expect('tests/test.srt')->toBeReadableFile();

    unlink('tests/test.srt');
});

it('can convert xml files into chunked srt files', function () {
    LaravelCaption::xml2srt(
        input: 'tests/Inputs/youtube.xml',
        output: 'tests/',
        every: 4,
    );

    expect('tests/chunk001.srt')->toBeReadableFile()
        ->and('tests/chunk002.srt')->toBeReadableFile()
        ->and('tests/chunk003.srt')->toBeReadableFile();

    unlink('tests/chunk001.srt');
    unlink('tests/chunk002.srt');
    unlink('tests/chunk003.srt');
});

it('can convert openai json files to srt format', function () {
    LaravelCaption::openai2srt(
        input: 'tests/Inputs/openai.json',
        output: 'tests/test.srt',
    );

    expect('tests/test.srt')->toBeReadableFile();

    unlink('tests/test.srt');
});
