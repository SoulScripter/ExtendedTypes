<?php

declare(strict_types=1);

namespace ExtendedTypes\StringTypes\Protocol;

readonly class Https extends AbstractProtocol
{
    private const TYPE = 'https';

    public static function create(): self
    {
        return new self(self::TYPE);
    }
}