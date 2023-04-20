<?php

declare(strict_types=1);

namespace ExtendedTypes\StringTypes\User;

use ExtendedTypes\Interfaces\IdentifierInterface;
use ExtendedTypes\Interfaces\StringTypeInterface;

readonly class Identifier implements IdentifierInterface, StringTypeInterface
{
    private function __construct(private string $identifier)
    {
    }

    public static function createFromString(string $string): self
    {
        return new self($string);
    }

    public function __toString(): string
    {
        return $this->identifier;
    }
}
