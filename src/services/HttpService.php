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


class HttpService extends AbstractHttpService implements HttpServiceInterface
{

  /** @var \GuzzleHttp\Client $httpClient */
  protected $httpClient;
  protected $endpoint;

  /** @var  \GuzzleHttp\Psr7\Response */
  protected $response;
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

    $this->response = $this->httpClient->request('POST', $url, [
      'headers' => Client::getInstance()->headers(),
      'json' => $body
    ]);

    return $this;
  }

  public function getData()
  {
    $responseBody = json_decode($this->response->getBody(), true);
    if (isset($responseBody['data'])) {
      $responseBody['data'] = (object) $responseBody['data'];
    }
    return (object) $responseBody;
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