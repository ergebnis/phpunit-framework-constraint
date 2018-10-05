<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018 Andreas Möller.
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/localheinz/phpunit-framework-constraint
 */

namespace Localheinz\PHPUnit\Framework\Constraint\Test\Unit;

use Localheinz\PHPUnit\Framework\Constraint\Provider;
use Localheinz\Test\Util\Helper;
use PHPUnit\Framework;

/**
 * @internal
 */
final class ProviderTest extends Framework\TestCase
{
    use Helper;
    use Provider;

    public function testAssertJsonStringSameAsJsonStringFailsWhenExpectedIsNotJson(): void
    {
        $expected = $this->faker()->sentence;

        $actual = <<<'JSON'
{
    "foo": "bar",
    "bar": "baz"
}
JSON;

        $this->expectException(Framework\ExpectationFailedException::class);

        $this->assertJsonStringSameAsJsonString($expected, $actual);
    }

    public function testAssertJsonStringSameAsJsonStringFailsWhenActualIsNotJson(): void
    {
        $expected = <<<'JSON'
{
    "foo": "bar",
    "bar": "baz"
}
JSON;

        $actual = $this->faker()->sentence;

        $this->expectException(Framework\ExpectationFailedException::class);

        $this->assertJsonStringSameAsJsonString($expected, $actual);
    }

    public function testAssertJsonStringSameAsJsonStringFailsWhenExpectedAndActualAreNotJson(): void
    {
        $value = $this->faker()->sentence;

        $this->expectException(Framework\ExpectationFailedException::class);

        $this->assertJsonStringSameAsJsonString($value, $value);
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

        $this->assertJsonStringSameAsJsonString($actual, $expected);
    }

    public function testJsonStringSameAsJsonStringSucceedsWhenExpectedAndActualAreTheSame(): void
    {
        $value = <<<'JSON'
{
    "foo": "bar",
    "bar": "baz"
}
JSON;

        $this->assertJsonStringSameAsJsonString($value, $value);
    }
}
