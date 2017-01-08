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

Coming.

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
