<?php

declare(strict_types=1);

namespace NGT\MultiInfo;

use NGT\MultiInfo\Contracts\Connection;
use NGT\MultiInfo\Contracts\Request;
use NGT\MultiInfo\Contracts\Response;

class Handler
{
    /**
     * The connection instance.
     *
     * @var \NGT\MultiInfo\Contracts\Connection
     */
    protected Connection $connection;

    /**
     * The handler constructor.
     *
     * @param \NGT\MultiInfo\Contracts\Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Handle the request.
     *
     * @param \NGT\MultiInfo\Contracts\Request $request
     *
     * @return \NGT\MultiInfo\Contracts\Response
     */
    public function handle(Request $request): Response
    {
        $response = $this->connection->send($request);

        return $request->getParser()->parse($response);
    }
}
