<?php
/**
 * Copyright (C) Marcelle Hövelmanns, art solution - All Rights Reserved
 *
 * @file        Response.php
 * @author      Marcelle Hövelmanns
 * @site        http://www.artsolution.de
 * @date        25.10.17
 */

namespace Affilicon;


class Response extends AbstractResponse implements ResponseInterface
{

  /** @var  \GuzzleHttp\Psr7\Response */
  protected $response;

  /**
   * Response constructor.
   * @param $response
   */
  public function __construct($response)
  {
    parent::__construct($response);
    $this->response = $response;
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
}
