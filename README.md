# PHP library for DaData.ru API

**Work In Progress, not ready for production use.**

## Simple example

```php
$http_client = new GuzzleHttp\Client();
$dadata_auth = new Auth('token', 'secret');
$client = new Client($http_client, $dadata_auth);

// Clean email address: https://dadata.ru/api/clean/email/
$email_cleaner = new EmailCleaner($client);
$result_set = $email_cleaner->clean(['serega@yandex/ru']);
if ($result_set->getResponseStatusCode() == 200) {
  $result_items = $result_set->getResultItems();
  $first_result = array_shift($result_items);
  $first_result->getEmail(); // serega@yandex.ru
}
```

## Installation

### Prerequisites

Library requires PHP 7.3.0+.

### Require package

1. You must have any [HTTP client or adapter](http://docs.php-http.org/en/latest/clients.html) that supports PSR-18.
1. Require library TBD (library is not distributable for now).

## How to use

TBD
