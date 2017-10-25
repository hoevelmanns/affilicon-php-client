<?php
/**
 * Copyright (C) Marcelle Hövelmanns, art solution - All Rights Reserved
 *
 * @file        ResponseInterface.php
 * @author      Marcelle Hövelmanns
 * @site        http://www.artsolution.de
 * @date        25.10.17
 */

namespace Affilicon;


interface ResponseInterface
{

  /**
   * ResponseInterface constructor.
   * @param $response
   */
  public function __construct($response);

  /**
   * @return array
   */
  public function getData();

}