<?php

namespace Mokhosh\LaravelXmlToSrt;

use DateTime;
use DateTimeZone;

class TimecodeConverter
{
    public static function floatToTimecode(float $seconds): string
    {
        $date = DateTime::createFromFormat('U.u', sprintf('%.3f', $seconds));
        $date->setTimezone(new DateTimeZone('UTC'));

        return $date->format('H:i:s,v');
    }
}
