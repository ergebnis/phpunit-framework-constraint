# phpunit-framework-constraint

[![Build Status](https://travis-ci.com/localheinz/phpunit-framework-constraint.svg?branch=master)](https://travis-ci.com/localheinz/phpunit-framework-constraint)
[![codecov](https://codecov.io/gh/localheinz/phpunit-framework-constraint/branch/master/graph/badge.svg)](https://codecov.io/gh/localheinz/phpunit-framework-constraint)
[![Latest Stable Version](https://poser.pugx.org/localheinz/phpunit-framework-constraint/v/stable)](https://packagist.org/packages/localheinz/phpunit-framework-constraint)
[![Total Downloads](https://poser.pugx.org/localheinz/phpunit-framework-constraint/downloads)](https://packagist.org/packages/localheinz/phpunit-framework-constraint)

Provides additional constraints for [`phpunit/phpunit`](https://github.com/sebastianbergmann/phpunit).

## Installation

Run

```
$ composer require localheinz/phpunit-framework-constraint
```

## Usage

Import the `Localheinz\PHPUnit\Framework\Constraint\Provider` trait into your test class:

```php
<?php

declare(strict_types=1);

namespace Foo\Bar\Test\Unit;

use Localheinz\PHPUnit\Framework\Constraint\Provider;
use PHPUnit\Framework\TestCase;

final class BazTest extends TestCase
{
    use Provider;
}
```

### Assertions

In addition to the assertions made available by extending from `PHPUnit\Framework\TestCase`,
the `Provider` trait provides the following assertions:

* `assertJsonStringSameAsJsonString(string $expected, string $actual, string $message = ''): void`

## Contributing

Please have a look at [`CONTRIBUTING.md`](.github/CONTRIBUTING.md).

## Code of Conduct

Please have a look at [`CODE_OF_CONDUCT.md`](.github/CODE_OF_CONDUCT.md).

## License

This package is licensed using the MIT License.
