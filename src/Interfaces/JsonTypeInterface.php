<?php

declare(strict_types=1);

namespace ExtendedTypes\Interfaces;

interface JsonTypeInterface
{
    public static function createFromJson(string $json): JsonTypeInterface;

    public function jsonEncode(): string;
}
