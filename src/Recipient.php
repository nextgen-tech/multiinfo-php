<?php

declare(strict_types=1);

namespace NGT\MultiInfo;

class Recipient
{
    /**
     * The phone number of recipient.
     *
     * @var string
     */
    protected string $destination;

    /**
     * The optional message content for recipient.
     *
     * @var string|null
     */
    protected ?string $content = null;

    /**
     * The recipient constructor.
     *
     * @param string      $destination
     * @param string|null $content
     */
    public function __construct(string $destination, string $content = null)
    {
        $this->destination = $destination;
        $this->content     = $content;
    }

    /**
     * Get the phone number of recipient.
     *
     * @return string
     */
    public function getDestination(): string
    {
        return $this->destination;
    }

    /**
     * Get the optional message content for recipient.
     *
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }
}
