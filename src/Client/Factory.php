<?php

namespace App\External\Enormail;

use Illuminate\Config\Repository as GlobalConfigRepository;
use Illuminate\Validation\ValidationException;

class Factory
{
    private GlobalConfigRepository $config;

    private string $format = 'json';

    public function __construct(GlobalConfigRepository $config)
    {
        $this->config = $config;
    }

    public function getFallBackListId()
    {
        $listId = $this->config->get('enormail.list_id');

        if (empty($listId)) {
            throw ValidationException::withMessages(['listId' => 'List Id is not set properly']);
        }

        return $listId;
    }

    /**
     * @return Contacts
     */
    public function contacts()
    {
        $contacts = new Contacts($this->create()->getTransport());
        $contacts->format = $this->format;

        return $contacts;
    }

    /**
     * @throws ValidationException
     */
    public function create(): ApiClient
    {
        $apiKey = $this->config->get('enormail.api_key');

        if (empty($apiKey)) {
            throw ValidationException::withMessages(['ApiKey' => 'Api key is not set properly']);
        }

        return new ApiClient($apiKey, $this->format);
    }

}
