<?php

namespace Kingscode\EnormailApi\Endpoints;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Kingscode\EnormailApi\Client\Client;

class AbstractEndpoint
{

    protected ?string $listId;

    public function __construct(protected Client $client,private string $format = 'json')
    {
        $this->client->setFormat($this->format);
    }

    /**
     * @return \Kingscode\EnormailApi\Client\Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

}
