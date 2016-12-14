php-iso11649
=============

ISO 11649:2009 RF creditor reference library for PHP 

Inspired by nruotsal/node-iso11649.

### Generating RF creditor reference

RF creditor reference can be generated from existing reference.

Existing reference characteristics:
 * Contain only numbers 0-9 and/or characters A-Z (example AB2G5 => RF68AB2G5).
 * Max length 21 characters.
 * Not case sensitive (example aB2g5 => RF68AB2G5).
 * Can be string with spaces (example '12345 12345' => RF451234512345).

## Release History

* 1.0.0
    - Initial release