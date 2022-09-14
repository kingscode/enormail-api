# Enormail API client

## Installation

```text
composer require kingscode/enormail-api
```

## Usage

:warning: Before you get started, make sure you already have a `api key` and `failover listId` from the


### Getting started

To get started you need to create a `KlantenVertellenWrapper` object, like so:
```php
$repository = new Repository('YOUR-TOKEN-HERE', 1234, 'nl');
$wrapper = new KlantenVertellenWrapper(new GetReviews($repository), new ReviewInvite($repository));
```
