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

Add the factory as a DI to any service or job.

```injectablephp
$response = $enorMailFactory->contacts()
            ->add('Your-ListId', 'Initials', 'info@kingscode.nl', $fieldsAsArray, array_filter($tags));
```

if you have the Failover list id set, then you are able to use.
```injectablephp
$factory->contacts()->getClient()->getFailoverListId();
```

### RateLimit
The API endpoints of Enormail have a ratelimit of 5 calls per second.
To account for this, there is the possibility to add a RteLimit in the job
This is part of a 3rd party packagde.

```text
composer require spatie/laravel-rate-limited-job-middleware
```

(If your application uses Redis, remove the false from the constructor call.)

```injectablephp

    public function middleware()
    {
        $rateLimitedMiddleware = (new RateLimited(false))
            ->allow(5)
            ->everySeconds(1)
            ->releaseAfterSeconds(5);

        return [$rateLimitedMiddleware];
    }

```
