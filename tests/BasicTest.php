<?php

use Mokhosh\LaravelCaption\Caption;
use Mokhosh\LaravelCaption\Generators\SrtGenerator;
use Mokhosh\LaravelCaption\Line;

beforeEach(function () {
    $caption = [
        [1.0, 1.0, 'line #1'],
        [2.0, 1.0, 'line #2'],
        [3.0, 1.0, 'line #3'],
        [4.0, 1.0, 'line #4'],
        [5.0, 1.0, 'line #5'],
    ];

    $this->caption = new Caption;

    foreach ($caption as $line) {
        $this->caption->add(new Line(...$line));
    }
});

it('can generate srt files', function () {
    SrtGenerator::load($this->caption)->export('tests/test.srt');

    expect('tests/test.srt')->toBeReadableFile();

    unlink('tests/test.srt');
});

it('can chunk xml to srt files', function () {
    SrtGenerator::load($this->caption)->chunk(2, 'tests/');

    expect('tests/chunk001.srt')->toBeReadableFile()
        ->and('tests/chunk002.srt')->toBeReadableFile()
        ->and('tests/chunk003.srt')->toBeReadableFile();

    unlink('tests/chunk001.srt');
    unlink('tests/chunk002.srt');
    unlink('tests/chunk003.srt');
});

test('you can omit last slash when chunking', function () {
    SrtGenerator::load($this->caption)->chunk(2, 'tests');

    expect('tests/chunk001.srt')->toBeReadableFile()
        ->and('tests/chunk002.srt')->toBeReadableFile()
        ->and('tests/chunk003.srt')->toBeReadableFile();

    unlink('tests/chunk001.srt');
    unlink('tests/chunk002.srt');
    unlink('tests/chunk003.srt');
});

it('returns srt filename', function () {
    $output = SrtGenerator::load($this->caption)->export('tests/test.srt');

    expect($output)->toBeReadableFile();

    unlink($output);
});

it('returns chunk filenames', function () {
    $chunks = SrtGenerator::load($this->caption)->chunk(2, 'tests/');

    foreach ($chunks as $chunk) {
        expect($chunk)->toBeReadableFile();

        unlink($chunk);
    }
});
