<?php

declare(strict_types=1);

namespace NGT\MultiInfo\Contracts;

interface Connection
{
    /**
     * Send the request via connection.
     *
     * @param \NGT\MultiInfo\Contracts\Request $request
     *
     * @return string
     */
    public function send(Request $request): string;
}
