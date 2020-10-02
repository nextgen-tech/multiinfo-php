<?php

declare(strict_types=1);

namespace NGT\MultiInfo\Responses;

abstract class Response
{
    protected int $code;

    public function __construct(int $code)
    {
        $this->code = $code;
    }

    public function getCode(): int
    {
        return $this->code;
    }
}
