<?php

declare(strict_types=1);

namespace NGT\MultiInfo\Requests;

use NGT\MultiInfo\Contracts\Request as RequestContract;
use NGT\MultiInfo\Parsers\InfoSmsParser;

class InfoSmsRequest extends Request implements RequestContract
{
    /**
     * The ID of the message.
     *
     * @var string
     */
    protected string $messageId;

    public function getHttpAction(): string
    {
        return 'infosms.aspx';
    }

    public function getParser(): InfoSmsParser
    {
        return new InfoSmsParser();
    }

    public function setMessageId(string $messageId): self
    {
        $this->messageId = $messageId;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'smsId' => $this->messageId,
        ];
    }
}
