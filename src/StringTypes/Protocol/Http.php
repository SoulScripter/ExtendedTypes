<?php

declare(strict_types=1);

namespace ExtendedTypes\StringTypes\Protocol;

readonly class Http extends AbstractProtocol
{
    private const TYPE = 'http';

    public static function create(): self
    {
        return new self(self::TYPE);
    }
}