<?php

declare(strict_types=1);

namespace NGT\MultiInfo;

use LogicException;
use ReflectionClass;

class Url
{
    public const API1 = 'api1';
    public const API2 = 'api2';

    /**
     * The API version of URL.
     *
     * @var string
     */
    protected string $version;

    /**
     * The API URL constructor.
     *
     * @param string $version
     */
    final public function __construct(string $version)
    {
        if ($this->isValidVersion($version) === false) {
            throw new LogicException('Invalid API version.');
        }

        $this->version = $version;
    }

    /**
     * Initialize URL with the first API version.
     *
     * @return self
     */
    public static function api1(): self
    {
        return new static(static::API1);
    }

    /**
     * Initialize URL with the second API version.
     *
     * @return self
     */
    public static function api2(): self
    {
        return new static(static::API2);
    }

    /**
     * Get the list of valid API versions.
     *
     * @return array<string>
     */
    protected function getValidVersions(): array
    {
        $reflector = new ReflectionClass(static::class);

        return array_values($reflector->getConstants());
    }

    /**
     * Check whether given API version is valid.
     *
     * @param string $version
     *
     * @return bool
     */
    protected function isValidVersion(string $version): bool
    {
        $reflector = new ReflectionClass(static::class);

        return in_array($version, $this->getValidVersions(), true);
    }

    /**
     * Convert the URL to format used by HTTP connection.
     *
     * @return string
     */
    public function toHttp(): string
    {
        return sprintf('https://%s.multiinfo.plus.pl/', $this->version);
    }
}
