<?php

declare(strict_types=1);

namespace NGT\MultiInfo\Contracts;

interface Request
{
    /**
     * Get the action name used by HTTP connection.
     *
     * @return string
     */
    public function getHttpAction(): string;

    /**
     * Get the parser instance.
     *
     * @return \NGT\MultiInfo\Contracts\Parser
     */
    public function getParser(): Parser;

    /**
     * Convert the request to array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array;

    /**
     * Convert the request to format used by HTTP connection.
     *
     * @return array<string, mixed>
     */
    public function toHttp(): array;

    /**
     * Get credentials of the request.
     *
     * @return \NGT\MultiInfo\Contracts\Credentials
     */
    public function getCredentials(): Credentials;
}
