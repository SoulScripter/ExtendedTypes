<?php

declare(strict_types=1);

namespace ExtendedTypes\StringTypes\User;

use ExtendedTypes\Interfaces\IdentifierInterface;
use ExtendedTypes\Interfaces\StringTypeInterface;

readonly class Username implements StringTypeInterface, IdentifierInterface
{
    private function __construct(private string $username)
    {
    }

    public static function createFromString(string $string): self
    {
        return new self($string);
    }

    public function __toString(): string
    {
        return $this->username;
    }
}
