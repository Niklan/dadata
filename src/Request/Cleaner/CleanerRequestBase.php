<?php

namespace Niklan\Dadata\Request\Cleaner;

use Niklan\Dadata\Request\RequestBase;

abstract class CleanerRequestBase extends RequestBase {

  protected $baseUrl = 'https://cleaner.dadata.ru';

  protected function sendRequest(string $body) {
    return $this->getDadataClient()->sendRequest($this->getRequestUri(), $body);
  }

}
