<?php

declare(strict_types=1);

namespace NGT\MultiInfo\Contracts;

interface SendableRequest extends Request
{
    public function setContent(string $content): self;

    public function setDestination(string $destination): self;

    public function setOrigin(string $origin): self;

    public function setAdvancedEncoding(bool $advancedEncoding): self;
}
