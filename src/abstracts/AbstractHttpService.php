<?php
/**
 * Copyright (C) Marcelle Hövelmanns, art solution - All Rights Reserved
 *
 * @file        AbstractHttpService.php
 * @author      Marcelle Hövelmanns
 * @site        http://www.artsolution.de
 * @date        25.10.17
 */

namespace Affilicon;


use GuzzleHttp\Psr7\Response;

/**
 * Class AbstractHttpService
 * @package Affilicon
 *
 */
abstract class AbstractHttpService implements HttpServiceInterface
{
  /** @var  \GuzzleHttp\Client */
  protected $httpClient;
  protected $endpoint;
  /** @var  Response $response */
  protected $response;
  protected $headers;
  public static $instance;

  /**
   * AbstractRequest constructor.
   */
  protected function __construct()
  {
    self::$instance = $this;
    $this->init();
  }

  public static function getInstance()
  {
    if (self::$instance === null) {
      self::$instance = new HttpService();
    }
    return self::$instance;
  }

  public function init()
  {
    $this->endpoint = AFFILICON_SERVICE_URL;
    $this->httpClient = new \GuzzleHttp\Client();
  }

  /**
   * @return object
   */
  public function getData()
  {
    $responseBody = json_decode($this->response->getBody(), true);
    if (isset($responseBody['data'])) {
      $responseBody['data'] = (object) $responseBody['data'];
    }
    return (object) $responseBody;
  }

  /**
   * @param array $headers
   */
  public function setHeaders($headers)
  {
    $this->headers = $headers;
  }

  /**
   * @return mixed
   */
  public function getHeaders()
  {
    return $this->headers;
  }

  /**
   * @param string $route
   * @param array $body
   * @return $this
   */
  public function post($route, $body = [])
  {
    $url = $this->endpoint . $route;

    $this->response = $this->httpClient->request('POST', $url, [
      'headers' => $this->getHeaders(),
      'json' => $body
    ]);

    return $this;
  }

  public function get($route)
  {
    // TODO: Implement get() method.
  }

  public function put($route, $body = [])
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

  private function __wakeup(){}

  private function __clone(){}

}