<?php

declare(strict_types=1);

namespace NGT\MultiInfo\Parsers;

use NGT\MultiInfo\Contracts\Parser as ParserContract;
use NGT\MultiInfo\Responses\PackageInfoResponse;

class PackageInfoParser extends Parser implements ParserContract
{
    protected function makeResponse(int $code, array $data): PackageInfoResponse
    {
        $response = new PackageInfoResponse($code);

        $response->setPackageId((int) $data[1]);
        $response->setRecipientCount((int) $data[2]);
        $response->setLeftRecipientCount((int) $data[3]);
        $response->setPackageStatus((int) $data[4]);

        return $response;
    }
}
