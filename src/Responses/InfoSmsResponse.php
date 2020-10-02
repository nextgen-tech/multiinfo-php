<?php

declare(strict_types=1);

namespace NGT\MultiInfo\Responses;

use DateTimeInterface;
use NGT\MultiInfo\Contracts\Response as ResponseContract;

class InfoSmsResponse extends Response implements ResponseContract
{
    protected int $messageId;

    protected int $contentType;

    protected string $content;

    protected int $protocolId;

    protected int $codingScheme;

    protected int $serviceId;

    protected int $connectorId;

    protected int $replyTo;

    protected int $priority;

    protected DateTimeInterface $sentAt;

    protected DateTimeInterface $validTo;

    protected bool $requestedDeliveryNotification;

    protected string $sender;

    protected string $receiver;

    protected int $status;

    protected string $statusChangedAt;

    public function setMessageId(int $messageId): void
    {
        $this->messageId = $messageId;
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

    public function setReplyTo(int $replyTo): void
    {
        $this->replyTo = $replyTo;
    }

    public function setPriority(int $priority): void
    {
        $this->priority = $priority;
    }

    public function setSentAt(DateTimeInterface $sentAt): void
    {
        $this->sentAt = $sentAt;
    }

    public function setValidTo(DateTimeInterface $validTo): void
    {
        $this->validTo = $validTo;
    }

    public function setRequestedDeliveryNotification(bool $requestedDeliveryNotification): void
    {
        $this->requestedDeliveryNotification = $requestedDeliveryNotification;
    }

    public function setSender(string $sender): void
    {
        $this->sender = $sender;
    }

    public function setReceiver(string $receiver): void
    {
        $this->receiver = $receiver;
    }

    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    public function setStatusChangedAt(string $statusChangedAt): void
    {
        $this->statusChangedAt = $statusChangedAt;
    }

    public function getMessageId(): int
    {
        return $this->messageId;
    }

    public function getContentType(): int
    {
        return $this->contentType;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getProtocolId(): int
    {
        return $this->protocolId;
    }

    public function getCodingScheme(): int
    {
        return $this->codingScheme;
    }

    public function getServiceId(): int
    {
        return $this->serviceId;
    }

    public function getConnectorId(): int
    {
        return $this->connectorId;
    }

    public function getReplyTo(): int
    {
        return $this->replyTo;
    }

    public function getPriority(): int
    {
        return $this->priority;
    }

    public function getSentAt(): DateTimeInterface
    {
        return $this->sentAt;
    }

    public function getValidTo(): DateTimeInterface
    {
        return $this->validTo;
    }

    public function getRequestedDeliveryNotification(): bool
    {
        return $this->requestedDeliveryNotification;
    }

    public function getSender(): string
    {
        return $this->sender;
    }

    public function getReceiver(): string
    {
        return $this->receiver;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function getStatusChangedAt(): string
    {
        return $this->statusChangedAt;
    }
}
