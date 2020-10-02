<?php

declare(strict_types=1);

namespace NGT\MultiInfo\Parsers;

use NGT\MultiInfo\Contracts\Parser as ParserContract;
use NGT\MultiInfo\Responses\SendSmsRawResponse;

class SendSmsRawParser extends Parser implements ParserContract
{
    protected function makeResponse(int $code, array $data): SendSmsRawResponse
    {
        $response = new SendSmsRawResponse($code);
        $response->setMessageId((int) $data[1]);

        return $response;
    }
}
