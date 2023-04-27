<?php

declare(strict_types=1);

namespace ExtendedTypes\Helper;

use ExtendedTypes\ArrayTypes\ClassArray;
use InvalidArgumentException;
use function get_declared_classes;
use function interface_exists;
use function is_subclass_of;

readonly class InterfaceHelper
{
    public static function getAllClassesWhichImplementsInterface(string $interface): ClassArray
    {
        if (!interface_exists($interface)) {
            throw new InvalidArgumentException('An interface by this name does not exist: ' . $interface);
        }

        $classArray = ClassArray::create();

        foreach (get_declared_classes() as $classToCheck) {
            if (is_subclass_of(object_or_class: $classToCheck, class: $interface, allow_string: true)) {
                $classArray->add($classToCheck);
            }
        }

        return $classArray;
    }
}
