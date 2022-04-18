# Publica-PHP
[![Github tag](https://badgen.net/github/tag/anibalealvarezs/publica-php)](https://github.com/anibalealvarezs/publica-php/tags/) [![GitHub license](https://img.shields.io/github/license/anibalealvarezs/publica-php.svg)](https://github.com/anibalealvarezs/publica-php/blob/master/LICENSE) [![Github all releases](https://img.shields.io/github/downloads/anibalealvarezs/publica-php/total.svg)](https://github.com/anibalealvarezs/publica-php/releases/) [![GitHub latest commit](https://badgen.net/github/last-commit/anibalealvarezs/publica-php)](https://GitHub.com/anibalealvarezs/publica-php/commit/) [![Ask Me Anything !](https://img.shields.io/badge/Ask%20me-anything-1abc9c.svg)](https://github.com/anibalealvarezs/anibalealvarezs)

## About

PHP library to connect to the [publica.la API](https://docs.publica.la/).

***

## Requirements

* PHP >= 8.0
* Composer

***

## Installation

Add the following to `composer.json`
```json
{
  "require": {
    "anibalealvarezs/publica-php": "*"
  },
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/anibalealvarezs/publica-php"
    }
  ]
}
```

Install all composer dependencies using:
```shell
composer install
```

Or install it via GitHub
```shell
composer require anibalealvarezs/publica-php
```

## Quick Start

### Note that this SDK requires PHP 8.0 or above.

```php
require_once('/path/to/PublicaPHP/vendor/autoload.php');

$publica = new PublicaPHP\ApiClient();

$publica->setConfig([
  'apiKey' => 'YOUR_API_KEY',
  'url' => 'YOUR_URL', // https://your.domain
]);

$response = $publica->users->getAllUsers();
print_r($response);
```

## Authentication Method

The client library must be configured to use **X-User-Token** header parameter.

## Other configuration options
The APIClient class lets you set various configuration options like timeouts, host, user agent, and debug output.