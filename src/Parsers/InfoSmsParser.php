<?php

declare(strict_types=1);

namespace NGT\MultiInfo\Parsers;

use NGT\MultiInfo\Contracts\Parser as ParserContract;
use NGT\MultiInfo\Responses\InfoSmsResponse;

class InfoSmsParser extends Parser implements ParserContract
{
    protected function makeResponse(int $code, array $data): InfoSmsResponse
    {
        $response = new InfoSmsResponse($code);

        $response->setMessageId((int) $data[1]);
        $response->setContentType((int) $data[2]);
        $response->setContent($data[3]);
        $response->setProtocolId((int) $data[4]);
        $response->setCodingScheme((int) $data[5]);
        $response->setServiceId((int) $data[6]);
        $response->setConnectorId((int) $data[7]);
        $response->setReplyTo((int) $data[8]);
        $response->setPriority((int) $data[9]);
        $response->setSentAt($this->formatRawDateTime($data[10]));
        $response->setValidTo($this->formatRawDateTime($data[11]));
        $response->setRequestedDeliveryNotification($this->formatRawBoolean($data[12]));
        $response->setSender($data[13]);
        $response->setReceiver($data[14]);
        $response->setStatus((int) $data[15]);
        $response->setStatusChangedAt($data[16]);

        return $response;
    }
}
