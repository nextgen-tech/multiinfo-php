<?php

declare(strict_types=1);

namespace NGT\MultiInfo\Parsers;

use NGT\MultiInfo\Contracts\Parser as ParserContract;
use NGT\MultiInfo\Responses\SendSmsResponse;

class SendSmsParser extends Parser implements ParserContract
{
    protected function makeResponse(int $code, array $data): SendSmsResponse
    {
        $response = new SendSmsResponse($code);
        $response->setMessageId((int) $data[1]);

        return $response;
    }
}
