# PHP library for DaData.ru API

**Work In Progress, not ready for production use.**

## Implemented API

- [ ] [Cleaner](https://dadata.ru/api/clean/)
  - [x] [Address](https://dadata.ru/api/clean/address/)
  - [x] [Email](https://dadata.ru/api/clean/email/)
  - [x] [Phone](https://dadata.ru/api/clean/phone/)
  - [x] [Birth date](https://dadata.ru/api/clean/birthdate/)
  - [x] [Passport](https://dadata.ru/api/clean/passport/)
  - [x] [Vehicle](https://dadata.ru/api/clean/vehicle/)
  - [x] [Name](https://dadata.ru/api/clean/name/)
  - [ ] [Complex](https://dadata.ru/api/clean/record/)

## Simple example

```php
$http_client = new GuzzleHttp\Client();
$dadata_auth = new Auth('token', 'secret');
$client = new Client($http_client, $dadata_auth);

// Clean email address: https://dadata.ru/api/clean/email/
$email_cleaner = new EmailCleaner($client);
$result_set = $email_cleaner->clean(['serega@yandex/ru']);
$result_items = $result_set->getResultItems();
if ($result_items->count()) {
  $first_result = $result_items->first()->getEmail(); // serega@yandex.ru
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
