<?php

declare(strict_types=1);

namespace NGT\MultiInfo\Parsers;

use DateTime;
use DateTimeInterface;
use InvalidArgumentException;
use NGT\MultiInfo\Contracts\Response as ResponseContract;
use NGT\MultiInfo\Responses\ErrorResponse;

abstract class Parser
{
    public function parse(string $data): ResponseContract
    {
        $data = $this->slice($data);
        $code = (int) $data[0];

        if ($code < 0) {
            return new ErrorResponse($code, $message = $data[1]);
        }

        return $this->makeResponse($code, $data);
    }

    /**
     * Slice given string data to array data.
     *
     * @param string $data
     *
     * @return array<string>
     */
    protected function slice(string $data): array
    {
        $data = trim($data);
        $data = str_replace(["\r\n", "\n", "\r"], "\n", $data);
        $data = explode("\n", $data);

        return array_map('trim', $data);
    }

    /**
     * Format raw datetime to instance of DateTimeInterface.
     *
     * @param string $value
     *
     * @return DateTimeInterface
     */
    protected function formatRawDateTime(string $value): DateTimeInterface
    {
        $format   = 'dmyHis';
        $datetime = DateTime::createFromFormat($format, $value);

        if ($datetime === false) {
            throw new InvalidArgumentException("Cannot convert {$value} to DateTimeInterface using {$format} format.");
        }

        return $datetime;
    }
    /**
     * Format raw boolean to boolean.
     *
     * @param string $value
     *
     * @return bool
     */
    protected function formatRawBoolean(string $value): bool
    {
        if ($value === 'True') {
            return true;
        } elseif ($value === 'False') {
            return false;
        } else {
            throw new InvalidArgumentException("Cannot convert {$value} to boolean.");
        }
    }

    /**
     * Make response from given response code and parsed data.
     *
     * @param int           $code
     * @param array<string> $data
     *
     * @return \NGT\MultiInfo\Contracts\Response
     */
    abstract protected function makeResponse(int $code, array $data): ResponseContract;
}
