<?php

use Mokhosh\LaravelCaption\Parsers\OpenAiTranscriptionParser;

it('can read openai transcription files', function () {
    $caption = OpenAiTranscriptionParser::import('tests/Inputs/openai.json')->parse();

    expect($caption->lines()->count())->toBe(8);
});

it('can load openai json response', function () {
    $response = json_decode(file_get_contents('tests/Inputs/openai.json'));
    $caption = OpenAiTranscriptionParser::load($response)->parse();

    expect($caption->lines()->count())->toBe(8);
});
