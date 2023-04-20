<?php

declare(strict_types=1);

namespace ExtendedTypes\StringTypes;

use Stringable;

interface StringTypeInterface extends Stringable
{
    public static function createFromString(string $string): self;
}