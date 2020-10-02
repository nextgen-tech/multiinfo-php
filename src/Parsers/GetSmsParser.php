<?php

declare(strict_types=1);

namespace NGT\MultiInfo\Parsers;

use NGT\MultiInfo\Contracts\Parser as ParserContract;
use NGT\MultiInfo\Responses\GetSmsResponse;

class GetSmsParser extends Parser implements ParserContract
{
    protected function makeResponse(int $code, array $data): GetSmsResponse
    {
        $response = new GetSmsResponse($code);
        $response->setMessageId((int) $data[1]);

        if ($response->getMessageId() === -1) {
            return $response;
        }

        $response->setSender($data[2]);
        $response->setReceiver($data[3]);
        $response->setContentType((int) $data[4]);
        $response->setContent($data[5]);
        $response->setProtocolId((int) $data[6]);
        $response->setCodingScheme((int) $data[7]);
        $response->setServiceId((int) $data[8]);
        $response->setConnectorId((int) $data[9]);
        $response->setReceivedAt($this->formatRawDateTime($data[10]));

        return $response;
    }
}
