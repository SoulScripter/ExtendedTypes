<?php

declare(strict_types=1);

namespace ExtendedTypes\ArrayTypes;

use InvalidArgumentException;
use function class_exists;

class ClassArray
{
    private array $classNames = [];

    private function __construct()
    {
    }

    public static function create(): self
    {
        return new self();
    }

    public function add(string $className): self
    {
        $this->validate($className);
        $this->classNames[] = $className;

        return $this;
    }

    private function validate(string $className): void
    {
        if (!class_exists($className)) {
            throw new InvalidArgumentException('A class by this name does not exist: ' . $className);
        }
    }

    public function getAsArray(): array
    {
        return $this->classNames;
    }
}
