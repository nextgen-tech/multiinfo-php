<?php

declare(strict_types=1);

namespace NGT\MultiInfo\Responses;

use NGT\MultiInfo\Contracts\Response as ResponseContract;

class ErrorResponse extends Response implements ResponseContract
{
    protected string $message;

    public function __construct(int $code, string $message)
    {
        parent::__construct($code);

        $this->message = $message;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}
