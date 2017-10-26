<?php
/**
 * Copyright (C) Marcelle Hövelmanns, art solution - All Rights Reserved
 *
 * @file        HttpService.php
 * @author      Marcelle Hövelmanns
 * @site        http://www.artsolution.de
 * @date        25.10.17
 */

namespace Affilicon;


class HttpService extends AbstractHttpService implements HttpServiceInterface
{

  protected $httpClient;
  protected $endpoint;
  protected $response;
  protected $headers;
  public static $instance;

  protected function __construct() {
    parent::__construct();
  }

  public static function getInstance()
  {
    return parent::getInstance();
  }

  public function init()
  {
    parent::init();
  }

  public function post($route, $body = [])
  {
    parent::post($route, $body);
    return $this;
  }

  public function get($route)
  {
    return parent::get($route);
  }

  public function put($route, $body = [])
  {
    return parent::put($route, $body = []);
  }

  public function delete($route, $body = [])
  {
    return parent::delete($route, $body);
  }

  public function patch($route, $body = [])
  {
    return parent::patch($route, $body);
  }

  public function getData()
  {
    return parent::getData();
  }

  public function setHeaders($headers)
  {
    parent::setHeaders($headers);
  }

  public function getHeaders()
  {
    return parent::getHeaders();
  }

  private function __wakeup(){}

  private function __clone(){}
}