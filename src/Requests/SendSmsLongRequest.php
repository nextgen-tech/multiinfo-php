<?php

declare(strict_types=1);

namespace NGT\MultiInfo\Requests;

use DateTimeInterface;
use NGT\MultiInfo\Contracts\Request as RequestContract;
use NGT\MultiInfo\Contracts\SendableRequest as SendableRequestContract;
use NGT\MultiInfo\Message;
use NGT\MultiInfo\Parsers\SendSmsLongParser;

class SendSmsLongRequest extends Request implements RequestContract, SendableRequestContract
{
    /**
     * The content of the message.
     *
     * @var string
     */
    protected string $content;

    /**
     * The destination of the message.
     *
     * @var string
     */
    protected string $destination;

    /**
     * The period of validity of the message.
     *
     * @var DateTimeInterface|null
     */
    protected ?DateTimeInterface $validTo = null;

    /**
     * Indicates whether the delivery notification should be requested.
     *
     * @var bool|null
     */
    protected ?bool $requestDeliveryNotification = null;

    /**
     * Indicates whether the message should use advanced encoding.
     *
     * @var bool|null
     */
    protected ?bool $advancedEncoding = null;

    /**
     * Indicates whether the message should be deleted after processing.
     *
     * @var bool|null
     */
    protected ?bool $deleteWhenProcessed = null;

    /**
     * The origin of the message.
     *
     * @var null
     */
    protected ?string $origin = null;

    public function getHttpAction(): string
    {
        return 'sendsmslong.aspx';
    }

    public function getParser(): SendSmsLongParser
    {
        return new SendSmsLongParser();
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function setDestination(string $destination): self
    {
        $this->destination = $destination;

        return $this;
    }

    public function setValidTo(DateTimeInterface $validTo): self
    {
        $this->validTo = $validTo;

        return $this;
    }

    public function setRequestDeliveryNotification(bool $requestDeliveryNotification): self
    {
        $this->requestDeliveryNotification = $requestDeliveryNotification;

        return $this;
    }

    public function setAdvancedEncoding(bool $advancedEncoding): self
    {
        $this->advancedEncoding = $advancedEncoding;

        return $this;
    }

    public function setDeleteWhenProcessed(bool $deleteWhenProcessed): self
    {
        $this->deleteWhenProcessed = $deleteWhenProcessed;

        return $this;
    }

    public function setOrigin(string $origin): self
    {
        $this->origin = $origin;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'text'              => $this->content,
            'dest'              => $this->destination,
            'validTo'           => $this->validTo,
            'delivNotifRequest' => $this->requestDeliveryNotification,
            'advancedEncoding'  => $this->advancedEncoding,
            'deleteContent'     => $this->deleteWhenProcessed,
            'orig'              => $this->origin,
        ];
    }
}
