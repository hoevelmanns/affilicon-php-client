<?php
/**
 * Copyright (C) Marcelle Hövelmanns, art solution - All Rights Reserved
 *
 * @file        AbstractRequest.php
 * @author      Marcelle Hövelmanns
 * @site        http://www.artsolution.de
 * @date        25.10.17
 */

namespace Affilicon;


abstract class AbstractHttpService implements HttpServiceInterface
{
  protected $httpClient;
  protected $endpoint;
  protected $response;
  public static $instance;

  /**
   * AbstractRequest constructor.
   */
  public function __construct()
  {
    // TODO: Implement getData() method.
  }

  public static function getInstance()
  {
    if (self::$instance === null) {
      self::$instance = new Request();
    }
    return self::$instance;
  }

  public function initClient()
  {
    $this->endpoint = AFFILICON_SERVICE_URL;
    $this->httpClient = new \GuzzleHttp\Client();
  }

  public function getData()
  {
    return $this->response;
  }

}