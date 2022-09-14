<?php

namespace Kingscode\EnormailApi\Endpoints;

use Illuminate\Support\Facades\Http;
use Kingscode\EnormailApi\Client\Client;

class AbstractEndpoint
{

    protected ?string $listId;

    public function __construct(protected Client $client, ?string $listId = null)
    {
        $this->listId = $listId ?? $this->client->getFailoverListId();
    }

}
