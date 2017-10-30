<?php
/**
 * Copyright (C) Marcelle Hövelmanns, art solution - All Rights Reserved
 *
 * @file        HttpService.php
 * @author      Marcelle Hövelmanns
 * @site        http://www.artsolution.de
 * @date        25.10.17
 */

namespace AffiliconApiClient\Services;


use AffiliconApiClient\Abstracts\AbstractHttpService;
use AffiliconApiClient\Interfaces\HttpServiceInterface;
use AffiliconApiClient\Traits\Singleton;
use GuzzleHttp\Client;

class HttpService extends AbstractHttpService implements HttpServiceInterface
{
  /** @var  \GuzzleHttp\Client */
  protected static $HttpClient;

  use Singleton;

  /**
   * @param $endpoint
   * @return mixed
   */
  public static function init($endpoint)
  {
    self::getInstance();

    static::$endpoint = $endpoint;
    static::$HttpClient = new Client();

    return self::$instance;
  }

  /**
   * @param array $headers
   */
  public static function setHeaders($headers)
  {
    static::$headers = $headers;
  }

  /**
   * @return mixed
   */
  public static function getHeaders()
  {
    return static::$headers;
  }

  /**
   * @param string $route
   * @param array $body
   * @return $this
   */
  public static function post($route, $body = [])
  {
    $url = static::$endpoint . $route;

    static::$response = static::$HttpClient->request('POST', $url, [
      'headers' => static::getHeaders(),
      'json' => $body
    ]);

    return self::$instance;
  }

  /**
   * @param string $route
   * @return $this
   */
  public static function get($route)
  {
    $url = static::$endpoint . $route;

    static::$response = static::$HttpClient->request('GET', $url, [
      'headers' => static::getHeaders()
    ]);

    return self::$instance;
  }

  public static function put($route, $body = []){
    // todo Implement put method;
  }

  public static function patch($route, $body)
  {
    //todo Implement patch method
  }

  public static function delete($route, $body = [])
  {
    // todo Implement delete() method.
  }

}