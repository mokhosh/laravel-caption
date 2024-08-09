# Work with SRT files and YouTube XML subtitles in Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mokhosh/laravel-caption.svg?style=flat-square)](https://packagist.org/packages/mokhosh/laravel-caption)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/mokhosh/laravel-caption/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/mokhosh/laravel-caption/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/mokhosh/laravel-caption/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/mokhosh/laravel-caption/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/mokhosh/laravel-caption.svg?style=flat-square)](https://packagist.org/packages/mokhosh/laravel-caption)

You can parse xml timecodes into line by line representation of the caption, and then generate srt files based on the parsed caption.

## Installation

You can install the package via composer:

```bash
composer require mokhosh/laravel-caption
```

## Concepts

`Caption` has a `Collection` of `Line`s, to which you can `add()` a new `Line`.
You can also get all `lines()` of a `Caption`.
Each line is a readonly value object consisting of a float `start`, a float `duration`, and a `text`.

You can also use `TimecodeConverter`'s `floatToTimecode()` to convert floating seconds/miliseconds values to formatted timecode.

## Usage

Let's say you need to read subtitles in any custom format and generate SRT subtitles based on its contents.

Here's how we convert an OpenAI transcription Json to an STR file:

```php
use Mokhosh\LaravelCaption\Caption;
use Mokhosh\LaravelCaption\Line;
use Mokhosh\LaravelCaption\SrtGenerator;

// $response = OpenAI::audio()->transcribe();

$caption = new Caption;

foreach ($response->segments as $segment) {
    $caption->add(new Line(
        floatval($segment->start),
        floatval($segment->end) - floatval($segment->start),
        trim($segment->text),
    ));
}

SrtGenerator::load($caption)->export('output.srt');
```

You can simply convert a YouTube xml timecode file to a srt subtitle file like so:

```php
use Mokhosh\LaravelCaption\Facades\LaravelCaption;

// convert to srt and return output path
$output = LaravelCaption::xml2srt('input.xml', 'output.srt');
```

If you need to chunk your xml into smaller srt files, do this:

```php
use Mokhosh\LaravelCaption\Facades\LaravelCaption;

// chunk every 10 lines into chunks/ folder and return an array of chunks' paths
$chunks = LaravelCaption::xml2srt('input.xml', 'chunks/', every: 10);
```

If you need more control you can do this:

```php
use Mokhosh\LaravelCaption\XmlCaptionParser;
use Mokhosh\LaravelCaption\SrtGenerator;

$caption = XmlCaptionParser::import('input.xml')->parse();
$output = SrtGenerator::load($caption)->export('output.srt');
```

And for chunking:

```php
use Mokhosh\LaravelCaption\XmlCaptionParser;
use Mokhosh\LaravelCaption\SrtGenerator;

$caption = XmlCaptionParser::import('input.xml')->parse();
// chunk every 4 lines into chunks folder and prefix chunk files with the word "part"
$chunks = SrtGenerator::load($caption)->chunk(4, 'chunks/', 'part');
```

## Testing

```bash
./vendor/bin/pest
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Mo Khosh](https://github.com/mokhosh)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
