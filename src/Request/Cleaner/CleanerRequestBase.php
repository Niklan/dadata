<?php

namespace Niklan\DaData\Request\Cleaner;

use Niklan\DaData\Request\RequestBase;

/**
 * Provides abstract implementation for clean request.
 */
abstract class CleanerRequestBase extends RequestBase {

  /**
   * {@inheritdoc}
   */
  protected $baseUrl = 'https://cleaner.dadata.ru';

}
