<?php

declare(strict_types=1);

namespace ExtendedTypes\StringTypes\Protocol;

readonly class PostgreSQL extends AbstractProtocol
{
    private const TYPE = 'postgres';

    public static function create(): self
    {
        return new self(self::TYPE);
    }
}