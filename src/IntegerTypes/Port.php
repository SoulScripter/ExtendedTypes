<?php

declare(strict_types=1);

namespace ExtendedTypes\IntegerTypes;

use ExtendedTypes\Interfaces\NumericTypeInterface;
use InvalidArgumentException;

readonly class Port implements NumericTypeInterface
{
    private const MIN = '0';

    private const MAX = '65535';

    private function __construct(private string $numeric)
    {
    }

    public static function createFromInteger(int $numeric): NumericTypeInterface
    {
        return self::createFromNumericString((string)$numeric);
    }

    public static function createFromNumericString(string $numeric): NumericTypeInterface
    {
        self::validate($numeric);
        return new self($numeric);
    }

    private static function validate(string $numeric): void
    {
        if (!is_numeric($numeric)) {
            throw new InvalidArgumentException('Given string is not numeric: ' . $numeric);
        }

        if (!((float)self::MIN <= (float)$numeric)) {
            throw new InvalidArgumentException('Given numeric is below the given minimum: ' . self::MIN . ' > ' . $numeric);
        }

        if (!((float)self::MAX <= (float)$numeric)) {
            throw new InvalidArgumentException('Given numeric is above the given maximum: ' . self::MAX . ' > ' . $numeric);
        }
    }

    public static function createFromFloat(float $numeric): NumericTypeInterface
    {
        return self::createFromNumericString((string)$numeric);
    }

    public function getAsInt(): int
    {
        return (int)$this->numeric;
    }

    public function getAsFloat(): float
    {
        return (float)$this->numeric;
    }

    public function __toString(): string
    {
        return $this->numeric;
    }
}
