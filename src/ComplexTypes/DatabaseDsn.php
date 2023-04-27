<?php

declare(strict_types=1);

namespace ExtendedTypes\ComplexTypes;

use ExtendedTypes\Helper\InterfaceHelper;
use ExtendedTypes\IntegerTypes\Port;
use ExtendedTypes\IntegerTypes\Version;
use ExtendedTypes\Interfaces\DatabaseProtocolInterface;
use ExtendedTypes\Interfaces\StringTypeInterface;
use ExtendedTypes\StringTypes\DatabaseName;
use ExtendedTypes\StringTypes\Host;
use InvalidArgumentException;
use function sprintf;
use function sscanf;

readonly class DatabaseDsn implements StringTypeInterface
{
    private const FORMAT = '%s://%s:%s@%s:%d/%s';

    private const SERVER_VERSION_EXTENSION = '%s?serverVersion=%s';

    private const DSN_INVALID_FORMAT = 'Input dsn does not follow the dsn format (Format: ' . self::FORMAT . ' or ' . self::FORMAT . self::SERVER_VERSION_EXTENSION . '). Input: ';

    private function __construct(
        private DatabaseProtocolInterface $protocol,
        private User                      $user,
        private Host                      $host,
        private Port                      $port,
        private DatabaseName              $databaseName,
        private ?Version                  $serverVersion,
    )
    {
    }

    public static function createFromString(string $string): self
    {
        $match = sscanf(
            $string,
            self::FORMAT . self::SERVER_VERSION_EXTENSION,
            $protocol,
            $identifier,
            $password,
            $host,
            $port,
            $databaseName,
            $serverVersion,
        );

        if ($match === null) {
            $match = sscanf(
                $string,
                self::FORMAT,
                $protocol,
                $identifier,
                $password,
                $host,
                $port,
                $databaseName,
            );

            $serverVersion = null;

            if ($match === null) {
                throw new InvalidArgumentException(self::DSN_INVALID_FORMAT . $string);
            }
        } else {
            $serverVersion = Version::createFromNumericString($serverVersion);
        }

        return self::createFromParameters(
            protocol: self::getProtocol(protocol: $protocol),
            user: User::createFromStringParameters(
                identifier: $identifier,
                password: $password,
            ),
            host: Host::createFromString($host),
            port: Port::createFromNumericString($port),
            databaseName: DatabaseName::createFromString($databaseName),
            serverVersion: $serverVersion,
        );
    }

    public static function createFromParameters(
        DatabaseProtocolInterface $protocol,
        User                      $user,
        Host                      $host,
        Port                      $port,
        DatabaseName              $databaseName,
        ?Version                  $serverVersion = null,
    ): self
    {
        return new self(
            protocol: $protocol,
            user: $user,
            host: $host,
            port: $port,
            databaseName: $databaseName,
            serverVersion: $serverVersion,
        );
    }

    private static function getProtocol(string $protocol): DatabaseProtocolInterface
    {
        $validProtocols = InterfaceHelper::getAllClassesWhichImplementsInterface(DatabaseProtocolInterface::class)
            ->getAsArray();

        foreach ($validProtocols as $databaseProtocolName) {
            $databaseProtocol = $databaseProtocolName::create();

            if ((string)$databaseProtocol === $protocol) {
                return $databaseProtocol;
            }
        }

        throw new InvalidArgumentException('Invalid protocol given: ' . $protocol);
    }

    public function __toString(): string
    {
        $dsn = sprintf(
            self::FORMAT,
            (string)$this->protocol,
            (string)$this->user->identifier(),
            (string)$this->user->password(),
            (string)$this->host,
            $this->port->getAsInt(),
            (string)$this->databaseName,
        );

        if ($this->serverVersion === null) {
            return $dsn;
        }

        return sprintf(self::SERVER_VERSION_EXTENSION, $dsn, (string)$this->serverVersion);
    }
}
