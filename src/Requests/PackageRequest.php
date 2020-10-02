<?php

declare(strict_types=1);

namespace NGT\MultiInfo\Requests;

use DateTimeInterface;
use NGT\MultiInfo\Contracts\Request as RequestContract;
use NGT\MultiInfo\Parsers\PackageParser;
use NGT\MultiInfo\Recipient;

class PackageRequest extends Request implements RequestContract
{
    /**
     * The default content of the message.
     *
     * @var string|null
     */
    protected ?string $defaultContent = null;

    /**
     * The list of recipients of message.
     *
     * @var array<\NGT\MultiInfo\Recipient>
     */
    protected array $recipients = [];

    /**
     * Indicates whether the delivery notification should be requested.
     *
     * @var bool|null
     */
    protected ?bool $requestDeliveryNotification = null;

    /**
     * The start date of dispatching the package.
     *
     * @var DateTimeInterface|null
     */
    protected ?DateTimeInterface $startDate = null;

    /**
     * The origin of the message.
     *
     * @var null
     */
    protected ?string $origin = null;

    public function getHttpAction(): string
    {
        return 'package.aspx';
    }

    public function getParser(): PackageParser
    {
        return new PackageParser();
    }

    public function setDefaultContent(string $defaultContent): self
    {
        $this->defaultContent = $defaultContent;

        return $this;
    }

    public function addRecipient(string $destination, string $content = null): self
    {
        $this->recipients[] = new Recipient($destination, $content);

        return $this;
    }

    public function setRequestDeliveryNotification(bool $requestDeliveryNotification): self
    {
        $this->requestDeliveryNotification = $requestDeliveryNotification;

        return $this;
    }

    public function setStartDate(DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function setOrigin(string $origin): self
    {
        $this->origin = $origin;

        return $this;
    }

    /**
     * Get the list of formatted destinations.
     *
     * @return array<string>
     */
    protected function getFormattedDestinations(): array
    {
        $destinations = [];

        foreach ($this->recipients as $recipient) {
            if ($recipient->getContent() === null) {
                $destinations[] = $recipient->getDestination();
            } else {
                $destinations[] = sprintf('%s,%s', $recipient->getDestination(), $recipient->getContent());
            }
        }

        return $destinations;
    }

    public function toArray(): array
    {
        return [
            'text'              => $this->defaultContent,
            'dest'              => $this->getFormattedDestinations(),
            'delivNotifRequest' => $this->requestDeliveryNotification,
            'startDate'         => $this->startDate,
            'orig'              => $this->origin,
        ];
    }
}
