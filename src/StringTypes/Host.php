<?php

declare(strict_types=1);

namespace ExtendedTypes\StringTypes;

use ExtendedTypes\Interfaces\StringTypeInterface;

readonly class Host implements StringTypeInterface
{
    private function __construct(private string $host)
    {
    }

    public static function createFromString(string $string): self
    {
        return new self(host: $string);
    }

    public function __toString()
    {
        return $this->host;
    }
}
