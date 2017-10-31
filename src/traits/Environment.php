<?php

/**
 * Copyright (C) Marcelle Hövelmanns, art solution - All Rights Reserved
 *
 * @file        Environment.php
 * @author      Marcelle Hövelmanns
 * @site        http://www.artsolution.de
 * @date        27.10.17
 */

namespace AffiliconApiClient\Traits;


use AffiliconApiClient\Configurations\Config;
use AffiliconApiClient\Exceptions\ConfigurationInvalid;

/**
 * Trait Environment
 * @package AffiliconApiClient\Traits
 */
trait Environment
{
  protected $environment;

  /**
   * Sets the environment, default 'production'
   * @param string $environmentName
   * @return $this
   * @throws ConfigurationInvalid
   */
  public function setEnvironment($environmentName = 'production')
  {
    if (!$this->environment) {

      $environment = Config::get("environment.$environmentName");

      if (!$environment) {
        throw new ConfigurationInvalid("Configuration for given environment not found");
      }

      $this->environment = (object) $environment;
    }

    return $this;
  }
}