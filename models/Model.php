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


abstract class Model extends ApiClient
{

  private $resource;

  public function construct()
  {
    parent::__construct();
  }

  /**
   * @param $id
   * @return null
   */
  public function findById($id)
  {
    // todo search in api resource
    $this->get("{$this->resource}/$id");
    return null;
  }

  public function findOne()
  {

  }
}