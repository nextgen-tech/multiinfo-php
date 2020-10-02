<?php

declare(strict_types=1);

namespace NGT\MultiInfo\Connections;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Psr7\Query;
use GuzzleHttp\RequestOptions;
use NGT\MultiInfo\Contracts\Connection as ConnectionContract;
use NGT\MultiInfo\Contracts\Request as RequestContract;
use Throwable;

class HttpConnection extends Connection implements ConnectionContract
{
    /**
     * The HTTP client instance.
     *
     * @var \GuzzleHttp\Client|null
     */
    protected ?Client $client = null;

    /**
     * Get the HTTP client instance.
     *
     * @return \GuzzleHttp\Client
     */
    public function getClient(): Client
    {
        if ($this->client === null) {
            $this->client = $this->makeClient();
        }

        return $this->client;
    }

    /**
     * Make the HTTP client instance.
     *
     * @return \GuzzleHttp\Client
     */
    protected function makeClient(): Client
    {
        return new Client([
            'base_uri' => $this->getUrl()->toHttp(),
            'curl'     => $this->getCertificate()->toHttp(),
        ]);
    }

    public function send(RequestContract $request): string
    {
        $data = array_merge($request->getCredentials()->toHttp(), $request->toHttp());
        $body = Query::build($data, PHP_QUERY_RFC1738);

        try {
            $response = $this->getClient()->post($request->getHttpAction(), [
                RequestOptions::BODY    => $body,
                RequestOptions::HEADERS => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
            ]);
        } catch (BadResponseException $e) {
            return $e->getResponse()->getBody()->getContents();
        } catch (Throwable $e) {
            throw $e;
        }

        return $response->getBody()->getContents();
    }
}
