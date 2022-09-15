<?php

namespace Kingscode\EnormailApi\Client;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Http\Client\PendingRequest;
use Kingscode\EnormailApi\Endpoints\Contacts;
use Kingscode\EnormailApi\Endpoints\Test;
use Kingscode\EnormailApi\Exception\ConfigurationException;

class Client
{

    protected string $host = 'https://api.enormail.eu/api/1.0';

    protected string $version = '1.0';

    protected string $apiKey;

    public function __construct(protected string $format = 'json')
    {
        if (! Config::has('enormail.api_key')) {
            throw new ConfigurationException('enormail.api_key');
        }
        $this->apiKey = Config::get('enormail.api_key');
    }

    public function getFailoverListId(): ?string
    {
        return Config::get('enormail.failover_list_id');
    }

    public function getHttp(): ?PendingRequest
    {
        if (empty($this->apiKey)) {
            throw new ConfigurationException('enormail.api_key');
        }

        return Http::withBasicAuth($this->apiKey, ':password')
            ->withHeaders([
                'User-Agent' => 'EM REST API WRAPPER ' . $this->version,
            ])->baseUrl($this->host);
    }

    /**
     * @return string
     */
    public function getFormat(): string
    {
        return Str::lower($this->format);
    }

    /**
     * @param  string $format
     */
    public function setFormat(string $format): void
    {
        $this->format = $format;
    }

}
