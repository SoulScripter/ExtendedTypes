<?php

declare(strict_types=1);

namespace ExtendedTypes\Interfaces;

interface ProtocolInterface extends StringTypeInterface
{
    public static function create(): self;
}
