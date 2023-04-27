<?php

declare(strict_types=1);

namespace ExtendedTypes\StringTypes;

use ExtendedTypes\Interfaces\StringTypeInterface;

readonly class DatabaseName implements StringTypeInterface
{
    private function __construct(private string $databaseName)
    {
    }

    public static function createFromString(string $string): self
    {
        return new self(databaseName: $string);
    }

    public function __toString()
    {
        return $this->databaseName;
    }
}
