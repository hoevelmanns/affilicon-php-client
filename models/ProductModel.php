<?php
/**
 * Copyright (C) Marcelle Hövelmanns, art solution - All Rights Reserved
 *
 * @file        ProductModel.php
 * @author      Marcelle Hövelmanns
 * @site        http://www.artsolution.de
 * @date        23.10.17
 */

namespace Affilicon;


class ProductModel extends Model
{

  /**
   * @var string
   */
  private $resource;

  public function __construct()
  {
    parent::__construct();
    $this->resource = '/products';
  }

  public function findOne()
  {
    parent::findOne(); // TODO: Change the autogenerated stub
  }

  /**
   * @param integer $id
   * @return null
   */
  public function findById($id)
  {
    return parent::findById($id); // TODO: Change the autogenerated stub
  }
}