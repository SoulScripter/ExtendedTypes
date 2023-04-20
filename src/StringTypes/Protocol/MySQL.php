<?php

declare(strict_types=1);

namespace ExtendedTypes\StringTypes\Protocol;

readonly class MySQL extends AbstractProtocol
{
    private const TYPE = 'mysql';

    public static function create(): self
    {
        return new self(self::TYPE);
    }
}