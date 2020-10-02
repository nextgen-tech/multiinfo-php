<?php

declare(strict_types=1);

namespace NGT\MultiInfo\Parsers;

use NGT\MultiInfo\Contracts\Parser as ParserContract;
use NGT\MultiInfo\Responses\SendSmsLongResponse;

class SendSmsLongParser extends Parser implements ParserContract
{
    protected function makeResponse(int $code, array $data): SendSmsLongResponse
    {
        $response = new SendSmsLongResponse($code);

        foreach ($data as $index => $value) {
            if ($index === 0) {
                continue;
            }

            $response->addMessageId((int) $value);
        }

        return $response;
    }
}
