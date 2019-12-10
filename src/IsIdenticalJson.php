<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/phpunit-framework-constraint
 */

namespace Ergebnis\PHPUnit\Framework\Constraint;

use PHPUnit\Framework;
use SebastianBergmann\Diff;

final class IsIdenticalJson extends Framework\Constraint\Constraint
{
    /**
     * @var Diff\Differ
     */
    private $differ;

    /**
     * @var string
     */
    private $value;

    public function __construct(string $value)
    {
        $this->differ = new Diff\Differ(new Diff\Output\UnifiedDiffOutputBuilder("\n--- Expected\n+++ Actual\n"));
        $this->value = $value;
    }

    public function toString(): string
    {
        return \sprintf(
            'is identical to "%s"',
            $this->exporter()->export($this->value)
        );
    }

    protected function matches($other): bool
    {
        return $other === $this->value;
    }

    protected function failureDescription($other): string
    {
        return 'two JSON strings are identical';
    }

    protected function additionalFailureDescription($other): string
    {
        return $this->differ->diff(
            $this->value,
            $other
        );
    }
}
