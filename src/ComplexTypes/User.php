<?php

declare(strict_types=1);

namespace ExtendedTypes\ComplexTypes;

use ExtendedTypes\Interfaces\IdentifierInterface;
use ExtendedTypes\Interfaces\StringTypeInterface;
use ExtendedTypes\StringTypes\User\Identifier;
use ExtendedTypes\StringTypes\User\Password;

readonly class User implements StringTypeInterface
{
    private const SEPARATOR = ':';

    private function __construct(
        private IdentifierInterface&StringTypeInterface $identifier,
        private Password                                $password,
    )
    {
    }

    public static function createFromStringParameters(
        string $identifier,
        string $password,
    ): self
    {
        return self::createFromParameters(
            Identifier::createFromString($identifier),
            Password::createFromString($password),
        );
    }

    public static function createFromParameters(
        IdentifierInterface&StringTypeInterface $identifier,
        Password                                $password,
    ): self
    {
        return new self(
            $identifier,
            $password,
        );
    }

    /** @param string $string Format 'identifier:password' */
    public static function createFromString(string $string): self
    {
        $arguments = explode(self::SEPARATOR, $string);

        return self::createFromStringParameters($arguments[0], $arguments[1]);
    }

    /** @return string Format 'identifier:password' */
    public function __toString(): string
    {
        return (string)$this->identifier() . self::SEPARATOR . (string)$this->password();
    }

    public function identifier(): IdentifierInterface&StringTypeInterface
    {
        return $this->identifier;
    }

    public function password(): Password
    {
        return $this->password;
    }
}
