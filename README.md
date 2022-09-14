# Enormail API client

## Installation

```text
composer require kingscode/enormail-api
```

## Documentation
The original documentation can be found at https://developer.enormail.eu/#general-information




## Usage

Before you get started, make sure you already have a `api key` from the
``
Account > API toegang > New API key
``
to get a `failover listId` you need to create or add list by the API.

### Getting started

Add the folling to you .env file
```dotenv
ENORMAIL_API_KEY=
ENORMAIL_FAILOVER_LIST_ID=
```

In the config file it will be matched to
```injectablephp

\Illuminate\Support\Facades\Config::get('enormail.api_key')
\Illuminate\Support\Facades\Config::get('enormail.failover_list_id')

```
