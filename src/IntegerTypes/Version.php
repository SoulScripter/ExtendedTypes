<?php

declare(strict_types=1);

namespace ExtendedTypes\IntegerTypes;

use ExtendedTypes\Interfaces\NumericTypeInterface;
use InvalidArgumentException;

readonly class Version implements NumericTypeInterface
{

    private function __construct(private string $numeric)
    {
    }

    public static function createFromInteger(int $numeric): self
    {
        return self::createFromNumericString((string)$numeric);
    }

    public static function createFromNumericString(string $numeric): self
    {
        self::validate($numeric);
        return new self($numeric);
    }

    private static function validate(string $numeric): void
    {
        if (!is_numeric($numeric)) {
            throw new InvalidArgumentException('Given string is not numeric: ' . $numeric);
        }
    }

    public static function createFromFloat(float $numeric): self
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
