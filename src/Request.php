<?php
/**
 * Copyright (C) Marcelle Hövelmanns, art solution - All Rights Reserved
 *
 * @file        Request.php
 * @author      Marcelle Hövelmanns
 * @site        http://www.artsolution.de
 * @date        25.10.17
 */

namespace Affilicon;


class Request extends AbstractRequest implements RequestInterface
{

  /** @var \GuzzleHttp\Client $httpClient */
  protected $httpClient;
  protected $endpoint;
  public static $instance;


  public function __construct() {
    self::$instance = $this;
    $this->initClient();
  }

  public static function getInstance() {
    if (self::$instance === null) {
      self::$instance = new self();
    }
    return self::$instance;
  }

  public function initClient()
  {
    $this->endpoint = AFFILICON_SERVICE_URL;
    $this->httpClient = new \GuzzleHttp\Client();
  }

  public function post($route, array $body = [], $headers = [])
  {
    $url = $this->endpoint . $route;

    $response = $this->httpClient->request('POST', $url, [
      'headers' => $headers,
      'json' => $body
    ]);

    return (new Response($response))->getData();
  }

  public function get($route)
  {
    // TODO: Implement get() method.
  }

  public function put($route, array $body = [])
  {
    // TODO: Implement put() method.
  }

  public function delete($route, $body = [])
  {
    // TODO: Implement delete() method.
  }

  public function patch($route, $body)
  {
    // TODO: Implement patch() method.
  }

}