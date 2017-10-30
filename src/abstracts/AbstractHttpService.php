<?php
/**
 * Copyright (C) Marcelle Hövelmanns, art solution - All Rights Reserved
 *
 * @file        AbstractHttpService.php
 * @author      Marcelle Hövelmanns
 * @site        http://www.artsolution.de
 * @date        25.10.17
 */

namespace AffiliconApiClient\Abstracts;


use AffiliconApiClient\Interfaces\HttpServiceInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

/**
 * Class AbstractHttpService
 * @package AffiliconApiClient\Abstracts
 */
abstract class AbstractHttpService implements HttpServiceInterface
{
  /** @var Client */
  protected static $HttpClient;
  protected static $endpoint;
  /** @var  Response $response */
  protected static $response;
  protected static $headers;

  /**
   * @return object
   */
  public function getData()
  {
    $responseBody = json_decode(static::$response->getBody(), true);

    if (array_exists('data', $responseBody)) {
      $responseBody['data'] = (object) $responseBody['data'];
    }

    return (object) $responseBody;
  }

}