<?php

namespace Niklan\DaData\Data;

/**
 * Provides Email factory.
 */
final class EmailFactory implements DataFactoryInterface {

  /**
   * {@inheritdoc}
   */
  public function create(array $data): DataInterface {
    return new Email($data);
  }

}
