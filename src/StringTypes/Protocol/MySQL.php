<?php

declare(strict_types=1);

namespace ExtendedTypes\StringTypes\Protocol;

use ExtendedTypes\Interfaces\DatabaseProtocolInterface;

readonly class MySQL extends AbstractProtocol implements DatabaseProtocolInterface
{
    private const TYPE = 'mysql';

    public static function create(): self
    {
        return new self(self::TYPE);
    }
}
