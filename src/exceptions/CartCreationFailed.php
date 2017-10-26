<?php

namespace Affilicon;


class CartCreationFailed extends ClientExceptions
{
  /**
   * CartCreationFailed constructor.
   * @param string $message
   */
  public function __construct($message)
  {
    parent::__construct("Invalid key" . $message, 1);
  }
}