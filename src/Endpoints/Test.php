<?php

namespace Kingscode\EnormailApi\Endpoints;

use Illuminate\Support\Facades\Http;

class Test extends AbstractEndpoint
{
    /**
     * Testing if your settings are correct and the host is available.
     * @return \Illuminate\Http\Client\Response
     */
    public function ping()
    {
        return $this->client->getHttp()->get('/ping.'.$this->client->getFormat());
    }
}
