<?php

namespace Niklan\Dadata;

use Http\Message\Authentication;
use Psr\Http\Message\RequestInterface;

/**
 * Provides authorization mechanism for the API.
 *
 * @see https://dadata.ru/profile/#info
 */
final class Auth implements Authentication {

  /**
   * The API key.
   *
   * @var string
   */
  protected $token;

  /**
   * The secret key.
   *
   * @var NULL|string
   */
  protected $secret;

  /**
   * Constructs a new Auth object.
   *
   * @param string $token
   *   The API key.
   * @param string|NULL $secret
   *   The secret key. Required for 'Cleaner' API calls.
   */
  public function __construct(string $token, string $secret = NULL) {
    $this->token = $token;
    $this->secret = $secret;
  }

  /**
   * {@inheritdoc}
   */
  public function authenticate(RequestInterface $request) {
    $token_header = sprintf('Token %s', $this->getToken());
    $request = $request->withHeader('Authorization', $token_header);

    if ($this->getSecret()) {
      $request = $request->withHeader('X-Secret', $this->getSecret());
    }

    return $request;
  }

  /**
   * Gets API key.
   *
   * @return string
   *   The API key.
   */
  public function getToken(): string {
    return $this->token;
  }

  /**
   * Gets secret key.
   *
   * @return NULL|string
   *   The secret key.
   */
  public function getSecret(): ?string {
    return $this->secret;
  }

}
