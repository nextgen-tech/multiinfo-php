<?php

declare(strict_types=1);

namespace NGT\MultiInfo\Requests;

use NGT\MultiInfo\Contracts\Request as RequestContract;
use NGT\MultiInfo\Parsers\GetSmsParser;

class GetSmsRequest extends Request implements RequestContract
{
    /**
     * The content of the message.
     *
     * @var int|null
     */
    protected ?int $timeout = null;

    /**
     * Indicates whether the manual confirmation of the message is enabled.
     *
     * @var bool|null
     */
    protected ?bool $manualConfirmation = null;

    /**
     * Indicates whether the message should be deleted after processing.
     *
     * @var bool|null
     */
    protected ?bool $deleteWhenProcessed = null;

    public function getHttpAction(): string
    {
        return 'getsms.aspx';
    }

    public function getParser(): GetSmsParser
    {
        return new GetSmsParser();
    }

    public function setTimeout(int $timeout): self
    {
        $this->timeout = $timeout;

        return $this;
    }

    public function setManualConfirmation(bool $manualConfirmation): self
    {
        $this->manualConfirmation = $manualConfirmation;

        return $this;
    }

    public function setDeleteWhenProcessed(bool $deleteWhenProcessed): self
    {
        $this->deleteWhenProcessed = $deleteWhenProcessed;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'timeout'       => $this->timeout,
            'manualconfirm' => $this->manualConfirmation,
            'deleteContent' => $this->deleteWhenProcessed,
        ];
    }
}
