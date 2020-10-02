<?php

declare(strict_types=1);

namespace NGT\MultiInfo\Parsers;

use NGT\MultiInfo\Contracts\Parser as ParserContract;
use NGT\MultiInfo\Responses\PackageResponse;

class PackageParser extends Parser implements ParserContract
{
    protected function makeResponse(int $code, array $data): PackageResponse
    {
        $response = new PackageResponse($code);
        $response->setPackageId((int) $data[1]);

        return $response;
    }
}
