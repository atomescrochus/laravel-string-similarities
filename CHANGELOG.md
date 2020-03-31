# Changelog

All Notable changes to `laravel-string-similarities` will be documented in this file.

Updates should follow the [Keep a CHANGELOG](http://keepachangelog.com/) principles.

# 2.0.0 - 2020-03-31
- Removed `illuminate\support` dependency because, well, we don't need it. 🤷‍♂️

## 1.3.3 - 2019-09-28
### Fix
- [This PR from @dearsina](https://github.com/atomescrochus/laravel-string-similarities/pull/5) fixes the Jaro-Winkler comparison returning different results when comparing an example string "A" to "B" and "B" to "A".

## 1.3.2 - 2017-10-09
### Fix
Fixed composer provider references.

## 1.3.1 - 2017-10-09
### Fix
Typo in the composer code for autodiscovery

## 1.3.0 - 2017-10-09
### Added
Support for Laravel 5.5 package autodiscovery.

## 1.2.0 - 2017-04-21

### Added
- JaroWinkler comparison is working, thanks to [jbardnz](https://github.com/jbardnz)

## 1.1.0 - 2017-01-11

### Added
- A function for comparison using similar_text()`
- Added a `all()` method that returns score for all available comparison methods

## 1.0.1 - 2017-01-10

### Fixed
- smg() that didn't return, but echo, stupid mistake.

## 1.0.0 - 2017-01-08

### Added
- Method for a Levenshtein comparison
- Method for a Smith Waterman Gotoh comparison

## 0.0.1 - 2017-01-08

### Added
- Skeleton for package.

## NEXT - YYYY-MM-DD

### Added
- Nothing

### Deprecated
- Nothing

### Fixed
- Nothing

### Removed
- Nothing

### Security
- Nothing
