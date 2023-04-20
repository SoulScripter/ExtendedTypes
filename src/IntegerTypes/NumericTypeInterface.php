<?php

declare(strict_types=1);

namespace ExtendedTypes\IntegerTypes;

use Stringable;

interface NumericTypeInterface extends Stringable
{
    public static function createFromNumericString(string $numeric): self;

    public static function createFromInteger(int $numeric): self;

    public static function createFromFloat(float $numeric): self;

    public function getAsInt(): int;

    public function getAsFloat(): float;
}