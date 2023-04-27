<?php

declare(strict_types=1);

namespace ExtendedTypes\Tests\ComplexTypes;

use ExtendedTypes\ComplexTypes\DatabaseDsn;
use PHPUnit\Framework\TestCase;

class DatabaseDsnTest extends TestCase
{
    public function testCreateFromString(): void
    {
        $dsn = 'mysql://root:root@localhost:3306/myDb?serverVersion=5.4';
        $result = DatabaseDsn::createFromString(string: $dsn);

        $this->assertSame($dsn, (string)$result);
    }
}
