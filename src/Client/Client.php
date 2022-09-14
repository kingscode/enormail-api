<?php

namespace Kingscode\EnormailApi\Client;

class Client
{
    public function getTransport(): ?Rest
    {
        return $this->transport;
    }
}
