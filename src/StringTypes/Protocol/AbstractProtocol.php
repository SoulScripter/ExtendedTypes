<?php

declare(strict_types=1);

namespace ExtendedTypes\StringTypes\Protocol;

use ExtendedTypes\Exceptions\MethodNotImplementedException;
use ExtendedTypes\Interfaces\ProtocolInterface;

abstract readonly class AbstractProtocol implements ProtocolInterface
{
    protected function __construct(private string $protocol)
    {
    }

    abstract public static function create(): self;

    /** @throws MethodNotImplementedException */
    public static function createFromString(string $string): self
    {
        throw new MethodNotImplementedException('createFromString');
    }

    public function __toString(): string
    {
        return $this->protocol;
    }
}
