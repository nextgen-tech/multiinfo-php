<?php

declare(strict_types=1);

namespace NGT\MultiInfo\Responses;

use NGT\MultiInfo\Contracts\Response as ResponseContract;

class SendSmsLongResponse extends Response implements ResponseContract
{
    /**
     * The list of message parts identifiers.
     *
     * @var array<int>
     */
    protected array $messageIds;

    /**
     * Add the message part identifier.
     *
     * @param int $messageId
     */
    public function addMessageId(int $messageId): void
    {
        $this->messageIds[] = $messageId;
    }

    /**
     * Get the message parts identifiers.
     *
     * @return array<int>
     */
    public function getMessageIds(): array
    {
        return $this->messageIds;
    }
}
