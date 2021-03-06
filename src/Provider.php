<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2020 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/phpunit-framework-constraint
 */

namespace Ergebnis\PHPUnit\Framework\Constraint;

trait Provider
{
    final protected static function assertJsonStringSameAsJsonString(string $expected, string $actual, string $message = ''): void
    {
        static::assertJson($expected, $message);
        static::assertJson($actual, $message);

        static::assertThat(
            $actual,
            new IsIdenticalJson($expected),
            $message
        );
    }
}
