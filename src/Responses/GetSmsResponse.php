<?php

declare(strict_types=1);

namespace NGT\MultiInfo\Responses;

use DateTimeInterface;
use NGT\MultiInfo\Contracts\Response as ResponseContract;

class GetSmsResponse extends Response implements ResponseContract
{
    protected int $messageId;

    protected ?string $sender = null;

    protected ?string $receiver = null;

    protected ?int $contentType = null;

    protected ?string $content = null;

    protected ?int $protocolId = null;

    protected ?int $codingScheme = null;

    protected ?int $serviceId = null;

    protected ?int $connectorId = null;

    protected ?DateTimeInterface $receivedAt = null;

    public function setMessageId(int $messageId): void
    {
        $this->messageId = $messageId;
    }

    public function setSender(string $sender): void
    {
        $this->sender = $sender;
    }

    public function setReceiver(string $receiver): void
    {
        $this->receiver = $receiver;
    }

    public function setContentType(int $contentType): void
    {
        $this->contentType = $contentType;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function setProtocolId(int $protocolId): void
    {
        $this->protocolId = $protocolId;
    }

    public function setCodingScheme(int $codingScheme): void
    {
        $this->codingScheme = $codingScheme;
    }

    public function setServiceId(int $serviceId): void
    {
        $this->serviceId = $serviceId;
    }

    public function setConnectorId(int $connectorId): void
    {
        $this->connectorId = $connectorId;
    }

    public function setReceivedAt(DateTimeInterface $receivedAt): void
    {
        $this->receivedAt = $receivedAt;
    }

    public function getMessageId(): int
    {
        return $this->messageId;
    }

    public function getSender(): ?string
    {
        return $this->sender;
    }

    public function getReceiver(): ?string
    {
        return $this->receiver;
    }

    public function getContentType(): ?int
    {
        return $this->contentType;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function getProtocolId(): ?int
    {
        return $this->protocolId;
    }

    public function getCodingScheme(): ?int
    {
        return $this->codingScheme;
    }

    public function getServiceId(): ?int
    {
        return $this->serviceId;
    }

    public function getConnectorId(): ?int
    {
        return $this->connectorId;
    }

    public function getReceivedAt(): ?DateTimeInterface
    {
        return $this->receivedAt;
    }
}
