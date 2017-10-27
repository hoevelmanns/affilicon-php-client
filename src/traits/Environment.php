<?php

/**
 * Copyright (C) Marcelle Hövelmanns, art solution - All Rights Reserved
 *
 * @file        Environment.php
 * @author      Marcelle Hövelmanns
 * @site        http://www.artsolution.de
 * @date        27.10.17
 */

namespace Artsolution\AffiliconApiClient\Traits;


use Artsolution\AffiliconApiClient\Exceptions\ConfigurationInvalid;

trait Environment
{
  protected $environment;

  /**
   * Sets the environment, default 'production'
   * @param string $name
   * @return $this
   * @throws ConfigurationInvalid
   */
  public function setEnvironment($name = null)
  {
    if (!$this->environment) {
      $environmentName = $name ? $name: 'production';

      if (!CONFIG || !CONFIG['environment'] || !CONFIG['environment'][$environmentName]) {
        throw new ConfigurationInvalid("Configuration for given environment not found");
      }

      $this->environment = (object) array_merge(
        CONFIG['environment'][$environmentName], ['name' => $environmentName]
      );
    }

    return $this;
  }

  /**
   * Gets the environment configuration
   * @return object
   */
  public function getEnvironmentConfig()
  {
    return $this->environment;
  }

  /**
   * Gets Configuration by given key
   * @param $key
   * @return object
   * @throws ConfigurationInvalid
   */
  public function getEnvironmentConfigByKey($key)
  {
    $config = $this->environment->{$key};

    if (!$config) {
      throw new ConfigurationInvalid("Missing Key \"$key\" in environment configuration");
    }

    return $this->environment->{$key};
  }
}