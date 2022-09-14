<?php

namespace Kingscode\EnormailApi\Client;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Kingscode\EnormailApi\Endpoints\Contacts;
use Kingscode\EnormailApi\Endpoints\Test;

class Client
{

    public function __construct(private string $format = 'json')
    {
    }

    public function getFailoverListId(): ?string
    {
        return Config::get('enormail.failover_list_id');
    }

    public function getHttp(): ?Http
    {
        return Http::withBasicAuth(Config::get('enormail.api_key'), ':password')
            ->withHeaders([
                'X-Example' => 'example',
            ])->baseUrl('https://github.com');
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


    public function test(){
        return new Test($this);
    }

    public function contacts(?string $listId = null){
        return new Contacts($this, $listId);
    }

}
