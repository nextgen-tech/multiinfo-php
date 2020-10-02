<?php

declare(strict_types=1);

namespace NGT\MultiInfo\Contracts;

interface Credentials
{
    /**
     * Get the login of credentials.
     *
     * @return string
     */
    public function getLogin(): string;

    /**
     * Get the password of credentials.
     *
     * @return string
     */
    public function getPassword(): string;

    /**
     * Get the service identifier of credentials.
     *
     * @return string
     */
    public function getServiceId(): string;

    /**
     * Convert credentials to format used by HTTP connection.
     *
     * @return array<string, string>
     */
    public function toHttp(): array;
}
