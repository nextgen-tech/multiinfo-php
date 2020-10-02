<?php

declare(strict_types=1);

namespace NGT\MultiInfo\Responses;

use NGT\MultiInfo\Contracts\Response as ResponseContract;

class SendSmsRawResponse extends Response implements ResponseContract
{
    protected int $messageId;

    public function setMessageId(int $messageId): void
    {
        $this->messageId = $messageId;
    }

    public function getMessageId(): int
    {
        return $this->messageId;
    }
}
