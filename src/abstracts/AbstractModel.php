<?php
/**
 * Copyright (C) Marcelle Hövelmanns, art solution - All Rights Reserved
 *
 * @file        Model.php
 * @author      Marcelle Hövelmanns
 * @site        http://www.artsolution.de
 * @date        22.10.17
 */

namespace Affilicon;


abstract class AbstractModel implements ModelInterface
{

  protected $resource;
  protected $HttpService;
  protected $Client;
  protected $rows;

  public function __construct()
  {
    $this->HttpService = HttpService::getInstance();
    $this->Client = AbstractClient::getInstance();
  }

  public function findById($id)
  {
    // TODO: Implement findById() method.
  }

  public function find($params, $with)
  {
    // TODO: Implement find() method.
  }

  public function fetch()
  {
    // TODO: Implement all() method.
  }

}