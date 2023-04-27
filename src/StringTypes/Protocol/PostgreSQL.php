<?php

declare(strict_types=1);

namespace ExtendedTypes\StringTypes\Protocol;

use ExtendedTypes\Interfaces\DatabaseProtocolInterface;

readonly class PostgreSQL extends AbstractProtocol implements DatabaseProtocolInterface
{
    private const TYPE = 'postgres';

    public static function create(): self
    {
        return new self(self::TYPE);
    }
}
