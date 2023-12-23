# Convert youtube xml subtitles to srt format

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mokhosh/laravel-xml2srt.svg?style=flat-square)](https://packagist.org/packages/mokhosh/laravel-xml2srt)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/mokhosh/laravel-xml2srt/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/mokhosh/laravel-xml2srt/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/mokhosh/laravel-xml2srt/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/mokhosh/laravel-xml2srt/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/mokhosh/laravel-xml2srt.svg?style=flat-square)](https://packagist.org/packages/mokhosh/laravel-xml2srt)

You can parse xml timecodes into line by line represenation of the caption, and then generate srt files based on the parsed caption.

## Installation

You can install the package via composer:

```bash
composer require mokhosh/laravel-xml2srt
```

## Usage

You can simply convert a youtube xml timecode file to a srt subtitle file like so:

```php
use Mokhosh\LaravelXmlToSrt\Facades\LaravelXmlToSrt;

LaravelXmlToSrt::convert('input.xml', 'output.srt');
```

If you need more control you can do this:

```php
use Mokhosh\LaravelXmlToSrt\XmlCaptionParser;
use Mokhosh\LaravelXmlToSrt\SrtGenerator;

$caption = XmlCaptionParser::import('input.xml')->parse();
SrtGenerator::load($caption)->export('output.srt');
```

`Caption` has a `Collection` of `Line`s, to which you can `add()` a new `Line`.
You can also get all `lines()` of a `Caption`.
Each line is a readonly value object consisting of a float `start`, a float `duration`, and a `text`.

You can also use `TimecodeConverter`'s `floatToTimecode()` to convert floating seconds/miliseconds values to formatted timecode.

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
