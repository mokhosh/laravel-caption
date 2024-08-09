<?php

use Mokhosh\LaravelCaption\TimecodeConverter;

it('can convert float to timecode', function () {
    $seconds = 0.0;
    $timecode = TimecodeConverter::floatToTimecode($seconds);

    expect($timecode)->toBe('00:00:00,000');

    $seconds = 3.912;
    $timecode = TimecodeConverter::floatToTimecode($seconds);

    expect($timecode)->toBe('00:00:03,912');

    $seconds = 162.561;
    $timecode = TimecodeConverter::floatToTimecode($seconds);

    expect($timecode)->toBe('00:02:42,561');
});
