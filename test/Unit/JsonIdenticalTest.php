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

use Localheinz\PHPUnit\Framework\Constraint\JsonIdentical;
use Localheinz\Test\Util\Helper;
use PHPUnit\Framework;
use SebastianBergmann\Exporter;

/**
 * @internal
 */
final class JsonIdenticalTest extends Framework\TestCase
{
    use Helper;

    public function testExtendsConstraint(): void
    {
        $this->assertClassExtends(Framework\Constraint\Constraint::class, JsonIdentical::class);
    }

    public function testEvaluateReturnsNullWhenValuesAreIdentical(): void
    {
        $value = <<<'JSON'
{
    "foo": "bar",
    "bar": "baz"
}
JSON;

        $constraint = new JsonIdentical($value);

        $this->assertNull($constraint->evaluate($value));
    }

    public function testEvaluateWithReturnResultReturnsTrueWhenValuesAreIdentical(): void
    {
        $value = <<<'JSON'
{
    "foo": "bar",
    "bar": "baz"
}
JSON;

        $description = $this->faker()->sentence;
        $returnResult = true;

        $constraint = new JsonIdentical($value);

        $this->assertTrue($constraint->evaluate(
            $value,
            $description,
            $returnResult
        ));
    }

    public function testEvaluateThrowsExceptionWhenValuesAreNotIdentical(): void
    {
        $value = <<<'JSON'
{
    "foo": "bar",
    "bar": "baz"
}
JSON;

        $other = <<<'JSON'
{
    "bar": "baz",
    "foo": "bar"
}
JSON;

        $constraint = new JsonIdentical($value);

        $this->expectException(Framework\ExpectationFailedException::class);
        $this->expectExceptionMessage('Failed asserting that two JSON strings are identical.');

        $constraint->evaluate($other);
    }

    public function testToStringReturnsDescription(): void
    {
        $value = <<<'JSON'
{
    "foo": "bar",
    "bar": "baz"
}
JSON;
        $constraint = new JsonIdentical($value);

        $exporter = new Exporter\Exporter();

        $expected = \sprintf(
            'is identical to "%s"',
            $exporter->export($value)
        );

        $this->assertSame($expected, $constraint->toString());
    }
}