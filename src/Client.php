<?php

/**
 * Copyright (C) Marcelle Hövelmanns, art solution - All Rights Reserved
 *
 * @file        Client.php
 * @author      Marcelle Hövelmanns
 * @site        http://www.artsolution.de
 * @date        02.10.17
 */

namespace AffiliconApiClient;

use AffiliconApiClient\Interfaces\ClientInterface;
use AffiliconApiClient\Services\HttpService;
use AffiliconApiClient\Traits\Authentication;
use AffiliconApiClient\Traits\Environment;
use AffiliconApiClient\Traits\Singleton;

if (!is_array(CONFIG)) {
  require "config/config.php";
  require "config/routes.php";
}

/**
 * Class Client
 * @package AffiliconApiClient
 */
class Client implements ClientInterface
{
  public $clientId;
  public $countryId;
  public $userLanguage;

  /** @var  HttpService */
  protected $HttpService;

  use Singleton;
  use Environment;
  use Authentication;

  public function init()
  {
    $this->setEnvironment();
    $this->HttpService = HttpService::getInstance();
    $this->HttpService->init($this->getEnvironmentConfigByKey('service_url'));
    $this->authenticate();
    return $this;
  }

  public function setClientId($id)
  {
    $this->clientId = $id;
    return $this;
  }

  public function getClientId()
  {
    return $this->clientId;
  }

  public function getCountryId()
  {
    return $this->countryId;
  }

  public function setCountryId($countryId)
  {
    $this->countryId = $countryId;
    return $this;
  }

  public function getUserLanguage()
  {
    return $this->userLanguage;
  }

  public function setUserLanguage($userLanguage)
  {
    $this->userLanguage = $userLanguage;
    return $this;
  }

}