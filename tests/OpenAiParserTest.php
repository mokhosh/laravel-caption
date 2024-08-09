<?php

use Mokhosh\LaravelCaption\OpenAiTranscriptionParser;

it('can read openai transcription files', function () {
    $caption = OpenAiTranscriptionParser::import('tests/test.json')->parse();

    expect($caption->lines()->count())->toBe(8);
});

it('can load openai json response', function () {
    $response = json_decode(file_get_contents('tests/test.json'));
    $caption = OpenAiTranscriptionParser::load($response)->parse();

    expect($caption->lines()->count())->toBe(8);
});
