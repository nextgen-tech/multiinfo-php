<?php

declare(strict_types=1);

namespace NGT\MultiInfo\Contracts;

interface Response
{
    public function getCode(): int;
}
