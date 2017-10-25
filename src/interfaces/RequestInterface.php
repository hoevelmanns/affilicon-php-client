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


interface RequestInterface
{

  /**
   * @param string $route
   * @param array $body
   * @param array $headers
   * @return \Affilicon\Response
   */
  public function post($route, array $body = [], $headers = []);

  /**
   * @param string $route
   * @return \Affilicon\Response
   */
  public function get($route);

  /**
   * @param string $route
   * @param array $body
   * @return \Affilicon\Response
   */
  public function put($route, array $body = []);

  /**
   * @param string $route
   * @param array $body
   * @return \Affilicon\Response
   */
  public function delete($route, $body = []);

  /**
   * @param string $route
   * @param array $body
   * @return \Affilicon\Response
   */
  public function patch($route, $body);

}