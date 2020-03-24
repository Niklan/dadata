<?php

namespace Niklan\DaData\Data;

/**
 * Provides Email factory.
 */
final class EmailFactory implements DataFactoryInterface {

  /**
   * {@iheritdoc}
   */
  public function create(array $data): DataInterface {
    return new Email($data);
  }

}
