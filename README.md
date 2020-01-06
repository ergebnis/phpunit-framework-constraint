# phpunit-framework-constraint

[![Continuous Deployment](https://github.com/ergebnis/phpunit-framework-constraint/workflows/Continuous%20Deployment/badge.svg)](https://github.com/ergebnis/phpunit-framework-constraint/actions)
[![Continuous Integration](https://github.com/ergebnis/phpunit-framework-constraint/workflows/Continuous%20Integration/badge.svg)](https://github.com/ergebnis/phpunit-framework-constraint/actions)
[![Code Coverage](https://codecov.io/gh/ergebnis/phpunit-framework-constraint/branch/master/graph/badge.svg)](https://codecov.io/gh/ergebnis/phpunit-framework-constraint)
[![Type Coverage](https://shepherd.dev/github/ergebnis/phpunit-framework-constraint/coverage.svg)](https://shepherd.dev/github/ergebnis/phpunit-framework-constraint)
[![Latest Stable Version](https://poser.pugx.org/ergebnis/phpunit-framework-constraint/v/stable)](https://packagist.org/packages/ergebnis/phpunit-framework-constraint)
[![Total Downloads](https://poser.pugx.org/ergebnis/phpunit-framework-constraint/downloads)](https://packagist.org/packages/ergebnis/phpunit-framework-constraint)

Provides additional constraints for [`phpunit/phpunit`](https://github.com/sebastianbergmann/phpunit).

## Installation

Run

```
$ composer require ergebnis/phpunit-framework-constraint
```

## Usage

Import the `Ergebnis\PHPUnit\Framework\Constraint\Provider` trait into your test class:

```php
<?php

declare(strict_types=1);

namespace Foo\Bar\Test\Unit;

use Ergebnis\PHPUnit\Framework\Constraint\Provider;
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

## Changelog

Please have a look at [`CHANGELOG.md`](CHANGELOG.md).

## Contributing

Please have a look at [`CODE_OF_CONDUCT.md`](https://github.com/ergebnis/.github/blob/master/CODE_OF_CONDUCT.md).

## Code of Conduct

Please have a look at [`CODE_OF_CONDUCT.md`](.github/CODE_OF_CONDUCT.md).

## License

This package is licensed using the MIT License.
