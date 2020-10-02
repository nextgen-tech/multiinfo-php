<?php

declare(strict_types=1);

namespace NGT\MultiInfo\Contracts;

interface Parser
{
    /**
     * Parse the response data to response instance.
     *
     * @param string $data
     *
     * @return \NGT\MultiInfo\Contracts\Response
     */
    public function parse(string $data): Response;
}
