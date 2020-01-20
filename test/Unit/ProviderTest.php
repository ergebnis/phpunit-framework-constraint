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

namespace Ergebnis\PHPUnit\Framework\Constraint\Test\Unit;

use Ergebnis\PHPUnit\Framework\Constraint\Provider;
use Ergebnis\Test\Util\Helper;
use PHPUnit\Framework;

/**
 * @internal
 *
 * @covers \Ergebnis\PHPUnit\Framework\Constraint\Provider
 *
 * @uses \Ergebnis\PHPUnit\Framework\Constraint\IsIdenticalJson
 */
final class ProviderTest extends Framework\TestCase
{
    use Helper;
    use Provider;

    public function testAssertJsonStringSameAsJsonStringFailsWhenExpectedIsNotJson(): void
    {
        $expected = self::faker()->sentence;

        $actual = <<<'JSON'
{
    "foo": "bar",
    "bar": "baz"
}
JSON;

        $this->expectException(Framework\ExpectationFailedException::class);

        self::assertJsonStringSameAsJsonString($expected, $actual);
    }

    public function testAssertJsonStringSameAsJsonStringFailsWhenActualIsNotJson(): void
    {
        $expected = <<<'JSON'
{
    "foo": "bar",
    "bar": "baz"
}
JSON;

        $actual = self::faker()->sentence;

        $this->expectException(Framework\ExpectationFailedException::class);

        self::assertJsonStringSameAsJsonString($expected, $actual);
    }

    public function testAssertJsonStringSameAsJsonStringFailsWhenExpectedAndActualAreNotJson(): void
    {
        $value = self::faker()->sentence;

        $this->expectException(Framework\ExpectationFailedException::class);

        self::assertJsonStringSameAsJsonString($value, $value);
    }

    public function testJsonStringSameAsJsonStringFailsWhenActualIsNotSameAsExpected(): void
    {
        $expected = <<<'JSON'
{
    "bar": "baz",
    "foo": "bar"
}
JSON;

        $actual = <<<'JSON'
{
    "foo": "bar",
    "bar": "baz"
}
JSON;
        $this->expectException(Framework\ExpectationFailedException::class);

        self::assertJsonStringSameAsJsonString($actual, $expected);
    }

    public function testJsonStringSameAsJsonStringSucceedsWhenExpectedAndActualAreTheSame(): void
    {
        $value = <<<'JSON'
{
    "foo": "bar",
    "bar": "baz"
}
JSON;

        self::assertJsonStringSameAsJsonString($value, $value);
    }
}
