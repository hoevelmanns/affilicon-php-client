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
  protected $headers;
  public static $instance;

  public function __construct() {
    self::$instance = $this;
    $this->initClient();
  }

  /**
   * @return HttpService
   */
  public static function getInstance()
  {
    return parent::getInstance();
  }

  /**
   * Initialize the HTTP client
   */
  public function initClient()
  {
    parent::initClient();
  }

  /**
   * @param string $route
   * @param array $body
   * @return $this
   */
  public function post($route, $body = [])
  {
    parent::post($route, $body);
    return $this;
  }

  /**
   * @param string $route
   * @return object
   */
  public function get($route)
  {
    return parent::get($route);
  }

  /**
   * @param string $route
   * @param array $body
   * @return object
   */
  public function put($route, $body = [])
  {
    return parent::put($route, $body = []);
  }

  /**
   * @param string $route
   * @param array $body
   * @return object
   */
  public function delete($route, $body = [])
  {
    return parent::delete($route, $body);
  }

  /**
   * @param string $route
   * @param array $body
   * @return object
   */
  public function patch($route, $body = [])
  {
    return parent::patch($route, $body);
  }

  /**
   * @return object
   */
  public function getData()
  {
    return parent::getData();
  }

  /**
   * @param array $headers
   */
  public function setHeaders($headers)
  {
    parent::setHeaders($headers);
  }

  /**
   * @return mixed
   */
  public function getHeaders()
  {
    return parent::getHeaders();
  }
}