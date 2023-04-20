<?php

declare(strict_types=1);

namespace ExtendedTypes\StringTypes\User;

use ExtendedTypes\StringTypes\StringTypeInterface;

readonly class Password implements StringTypeInterface
{
    private function __construct(private string $password)
    {
    }

    public static function createFromString(string $string): StringTypeInterface
    {
        return new self($string);
    }

    public function __toString(): string
    {
        return $this->password;
    }
}
