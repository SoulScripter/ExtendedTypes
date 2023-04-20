<?php

declare(strict_types=1);

namespace ExtendedTypes\StringTypes\Protocol;

use ExtendedTypes\StringTypes\StringTypeInterface;

interface ProtocolInterface extends StringTypeInterface
{
    public static function create(): self;
}