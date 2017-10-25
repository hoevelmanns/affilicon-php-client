<?php
/**
 * Copyright (C) Marcelle Hövelmanns, art solution - All Rights Reserved
 *
 * @file        AbstractResponse.php
 * @author      Marcelle Hövelmanns
 * @site        http://www.artsolution.de
 * @date        25.10.17
 */

namespace Affilicon;


class AbstractResponse implements ResponseInterface
{

  protected $response;
  /**
   * AbstractResponse constructor.
   * @param $response
   */
  public function __construct($response)
  {
    $this->response = $response;
  }

  public function getData()
  {
    return $this->response;
  }



}