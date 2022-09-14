<?php

namespace Kingscode\EnormailApi\Client;

use Kingscode\EnormailApi\Client\Client;
use Kingscode\EnormailApi\Endpoints\Contacts;
use Kingscode\EnormailApi\Endpoints\Test;

class Factory
{

    /**
     * @param  \Kingscode\EnormailApi\Client\Client|null $client
     */
    public function __construct(private ?Client $client)
    {
    }

    /**
     * Get test enpoint class
     *
     * @return \Kingscode\EnormailApi\Endpoints\Test
     */
    public function test(): Test
    {
        return new Test($this->client);
    }

    /**
     * Get Contacts endpoint
     *
     * @param  string|null $listId
     * @return \Kingscode\EnormailApi\Endpoints\Contacts
     */
    public function contacts(): Contacts
    {
        return new Contacts($this->client);
    }

}
