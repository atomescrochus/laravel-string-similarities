# laravel-string-similarities

Compare two string and get a similarity percentage. Note that I did not write the algorithms myself, see down this document for the full credits.

## Install

You can install this package via composer:

``` bash
$ composer require atomescrochus/laravel-string-similarities
```

Then you have to install the package' service provider and alias:

```php
// config/app.php
'providers' => [
    ...
    Atomescrochus\StringSimilarities\StringSimilaritiesServiceProvider::class,
];
```

## Usage

``` php
$comparison = new \Atomescrochus\StringSimilarities\Compare();

// the functions returns similarity percentage between strings
$levenshtein = $comparison->levenshtein('first string', 'second string'); // Levenshtein comparison
$smg = $comparison->smg('first string', 'second string'); // Smith Waterman Gotoh comparison

// this one is not functional at the moment, use at your own risk if you do
// I have trouble adapting its code to PHP7.0 and up.
$jw = $comparison->jaroWinkler('first string', 'second string'); // Jaro Winkler comparison
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

Coming.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email jp@atomescroch.us instead of using the issue tracker.

## Credits

- [Jean-Philippe Murray][link-author]
- [joshweir over StackOverflow](http://stackoverflow.com/a/38236357/1001942) for pointing me to the solutions and algorithms for the Jaro Winkler and Smith Waterman Gotoh comparison
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
