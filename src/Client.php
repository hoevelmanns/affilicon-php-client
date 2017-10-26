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

require __DIR__ . '/../vendor/autoload.php';

/**
 * Class ApiClient
 * @package Affilicon
 */

class Client implements ClientInterface
{
  protected $token;
  protected $username;
  protected $password;
  public $clientId;
  public $countryId;
  public $userLanguage;

  public static $instance;

  protected function __construct()
  {
    self::$instance = $this;
  }

  public static function getInstance()
  {
    if (self::$instance === null) {
      self::$instance = new self();
    }
    return self::$instance;
  }

  public function init()
  {
    $this->authenticate();
    return $this;
  }

  /**
   * Checks if client is authenticated
   * @return bool
   */
  public function isAuthenticated()
  {
    return !is_null($this->token);
  }

  /**
   * Authenticate to api
   * @return string
   * @throws AuthenticationFailed
   */
  public function authenticate()
  {
    if ($this->isAuthenticated()) {
      return $this->getToken();
    }

    $member = isset($this->username) && isset($this->password);

    /** @var HttpService $httpService */
    $httpService = HttpService::getInstance();

    try {
      $authType = $member ? 'member' : 'anonymous';

      $data = $httpService
        ->post(API['routes']['auth'][$authType])
        ->getData();

    } catch (\Exception $e) {
      throw new AuthenticationFailed($e->getMessage(), $e->getCode());
    }

    if (!$data || !$data->token) {
      throw new AuthenticationFailed('token invalid', 403);
    }

    $httpService
      ->setHeaders([
        'Authorization' => 'Bearer ' . $data->token ?? '',
        'username' => $this->username,
        'password' => $this->password
      ]);

    return $this->token = $data->token;
  }

  /**
   * Sets the username, only expected if you use the api as member or employee
   * @param $username
   */
  public function setUserName($username)
  {
    $this->userName = $username;
  }

  /**
   * Gets the username
   * @return mixed
   */
  public function getUsername()
  {
    return $this->username;
  }

  /**
   * Sets the password, only expected if you use the api as member or employee
   * @param $password
   */
  public function setPassword($password)
  {
    $this->password = $password;
  }


  /**
   * Gets the token
   * @return string
   */
  public function getToken()
  {
    return $this->token;
  }

  /**
   * Sets the Client ID, previously called Vendor ID
   * @param $id
   * @return $this
   */
  public function setClientId($id)
  {
    $this->clientId = $id;
    return $this;
  }

  /**
   * Gets the Client ID, previously called Vendor ID
   * @return mixed
   */
  public function getClientId()
  {
    return $this->clientId;
  }

  /**
   * Gets the specified country code
   * @return mixed
   */
  public function getCountryId()
  {
    return $this->countryId;
  }

  /**
   * Sets the country code, eg. "en-US"
   * @param $countryId
   * @return $this
   */
  public function setCountryId($countryId)
  {
    $this->countryId = $countryId;
    return $this;
  }

  /**
   * Gets the specified user language
   * @return string
   */
  public function getUserLanguage()
  {
    return $this->userLanguage;
  }

  /**
   * Sets the user language, eg. "en"
   * @param $userLanguage
   * @return $this
   */
  public function setUserLanguage($userLanguage)
  {
    $this->userLanguage = $userLanguage;
    return $this;
  }

  private function __wakeup(){}

  private function __clone(){}


}