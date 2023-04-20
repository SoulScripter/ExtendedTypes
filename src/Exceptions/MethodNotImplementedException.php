<?php

declare(strict_types=1);

namespace ExtendedTypes\Exceptions;

use Exception;

class MethodNotImplementedException extends Exception
{
    private const MESSAGE_TEMPLATE = 'The method %s is yet to be implemented.';

    public function __construct(string $methodName)
    {
        parent::__construct(sprintf(self::MESSAGE_TEMPLATE, $methodName));
    }
}