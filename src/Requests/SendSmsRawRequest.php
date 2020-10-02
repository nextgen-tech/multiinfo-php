<?php

declare(strict_types=1);

namespace NGT\MultiInfo\Requests;

use DateTimeInterface;
use NGT\MultiInfo\Contracts\Request as RequestContract;
use NGT\MultiInfo\Parsers\SendSmsRawParser;

class SendSmsRawRequest extends Request implements RequestContract
{
    /**
     * The header of the message.
     *
     * @var string|null
     */
    protected ?string $header = null;

    /**
     * The content of the message.
     *
     * @var string|null
     */
    protected ?string $content = null;

    /**
     * The protocol ID of the message.
     *
     * @var int|null
     */
    protected ?int $protocolId = null;

    /**
     * The coding scheme of the message.
     *
     * @var int|null
     */
    protected ?int $codingScheme = null;

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
        return 'sendsmsraw.aspx';
    }

    public function getParser(): SendSmsRawParser
    {
        return new SendSmsRawParser();
    }

    public function setHeader(string $header): self
    {
        $this->header = $header;

        return $this;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function setProtocolId(int $protocolId): self
    {
        $this->protocolId = $protocolId;

        return $this;
    }

    public function setCodingScheme(int $codingScheme): self
    {
        $this->codingScheme = $codingScheme;

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
            'dataHeader'        => $this->header,
            'data'              => $this->content,
            'pid'               => $this->protocolId,
            'dcs'               => $this->codingScheme,
            'dest'              => $this->destination,
            'validTo'           => $this->validTo,
            'delivNotifRequest' => $this->requestDeliveryNotification,
            'deleteContent'     => $this->deleteWhenProcessed,
            'orig'              => $this->origin,
        ];
    }
}
