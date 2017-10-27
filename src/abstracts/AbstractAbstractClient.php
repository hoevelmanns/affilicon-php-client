<?php

/**
 * Copyright (C) Marcelle Hövelmanns, art solution - All Rights Reserved
 *
 * @file        Client.php
 * @author      Marcelle Hövelmanns
 * @site        http://www.artsolution.de
 * @date        02.10.17
 */

namespace Affilicon;

require __DIR__ . '../../vendor/autoload.php';

/**
 * Class ApiClient
 * @package Affilicon
 */

class AbstractClient implements ClientInterface
{
  protected $token;
  protected $username;
  protected $password;
  protected $environment;
  public $clientId;
  public $countryId;
  public $userLanguage;

  /** @var  HttpService */
  protected $HttpService;

  use Singleton;

  protected function __construct()
  {
  }

  /**
   * Sets the environment
   * @param string $environment
   */
  public function setEnv($environment)
  {
    $this->environment = $environment;
  }

  /**
   * Gets the environment
   * @return object
   */
  public function getEnv()
  {
    return (object) CONFIG['environment'][$this->environment];
  }

  public function init()
  {
    $this->setEnv($this->environment ?? 'production');
    $this->HttpService::getInstance()->init($this->environment->endpoint);
    $this->authenticate();
    return $this;
  }

  public function isAuthenticated()
  {
    return !is_null($this->token);
  }
  
  public function authenticate()
  {
    if ($this->isAuthenticated()) {
      return $this->getToken();
    }

    $member = isset($this->username) && isset($this->password);

    try {
      $authType = $member ? 'member' : 'anonymous';

      $data = $this->HttpService
        ->post(API['routes']['auth'][$authType])
        ->getData();

    } catch (\Exception $e) {
      throw new AuthenticationFailed($e->getMessage(), $e->getCode());
    }

    if (!$data || !$data->token) {
      throw new AuthenticationFailed('token invalid', 403);
    }

    $this->HttpService
      ->setHeaders([
        'Authorization' => 'Bearer ' . $data->token ?? '',
        'username' => $this->username,
        'password' => $this->password
      ]);

    return $this->token = $data->token;
  }

  public function setUserName($username)
  {
    $this->username = $username;
    return $this;
  }

  public function getUsername()
  {
    return $this->username;
  }

  public function setPassword($password)
  {
    $this->password = $password;
    return $this;
  }

  public function getToken()
  {
    return $this->token;
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

  private function __wakeup(){}

  private function __clone(){}

}