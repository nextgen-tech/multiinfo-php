<?php

declare(strict_types=1);

namespace NGT\MultiInfo\Requests;

use DateTimeInterface;
use NGT\MultiInfo\Contracts\Credentials as CredentialsContract;
use NGT\MultiInfo\Contracts\Request as RequestContract;

abstract class Request implements RequestContract
{
    protected CredentialsContract $credentials;

    public function __construct(CredentialsContract $credentials)
    {
        $this->credentials = $credentials;
    }

    public function getCredentials(): CredentialsContract
    {
        return $this->credentials;
    }

    abstract public function toArray(): array;

    public function toHttp(): array
    {
        $data = array_map(function ($field) {
            return $this->formatValueToHttp($field);
        }, $this->toArray());

        return array_filter($data, function ($field) {
            return $field !== null;
        });
    }

    /**
     * Format the value to format used by HTTP connection.
     *
     * @param mixed $value
     *
     * @return array<string>|string|null
     */
    protected function formatValueToHttp($value)
    {
        if ($value === null) {
            return null;
        } elseif (is_bool($value)) {
            return $this->formatBooleanValueToHttp($value);
        } elseif ($value instanceof DateTimeInterface) {
            return $this->formatDateTimeValueToHttp($value);
        } elseif (is_array($value)) {
            return $this->formatArrayValueToHttp($value);
        }

        return (string) $value;
    }

    /**
     * Format boolean value to format used by HTTP connection.
     *
     * @param bool $value
     *
     * @return string
     */
    protected function formatBooleanValueToHttp(bool $value): string
    {
        return $value === true ? 'true' : 'false';
    }

    /**
     * Format datetime value to format used by HTTP connection.
     *
     * @param DateTimeInterface $value
     *
     * @return string
     */
    protected function formatDateTimeValueToHttp(DateTimeInterface $value): string
    {
        return $value->format('dmyHis');
    }

    /**
     * Format array value to format used by HTTP connection.
     *
     * @param array<mixed> $value
     *
     * @return array<mixed>
     */
    protected function formatArrayValueToHttp(array $value): array
    {
        return $value;
    }
}
