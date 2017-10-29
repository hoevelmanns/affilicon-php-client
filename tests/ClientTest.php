<?php

/**
 * Copyright (C) Marcelle Hövelmanns, art solution - All Rights Reserved
 *
 * @file        ClientTest.php
 * @author      Marcelle Hövelmanns
 * @site        http://www.artsolution.de
 * @date        29.10.17
 */

use AffiliconApiClient\Client;
use PHPUnit\Framework\TestCase;

final class ClientTest extends TestCase
{
  public function testCanBeInitializeClient()
  {
    $client = new Client();

    $this->assertInstanceOf(
      $client::getInstance(),
      $client->init()
    );
  }
}