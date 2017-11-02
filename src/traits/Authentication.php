<?php
/**
 * Copyright (C) Marcelle Hövelmanns, art solution - All Rights Reserved
 *
 * @file        Authentication.php
 * @author      Marcelle Hövelmanns
 * @site        http://www.artsolution.de
 * @date        28.10.17
 */

namespace AffiliconApiClient\Traits;


use AffiliconApiClient\Configurations\Config;
use AffiliconApiClient\Exceptions\AuthenticationFailed;

/**
 * Trait Authentication
 * @package AffiliconApiClient\Traits
 */
trait Authentication
{
  protected $token;
  protected $username;
  protected $password;

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
      $authRoute = Config::get("routes.auth.$authType");

      $data = $this->HttpService->post($authRoute)->getData();

    } catch (\Exception $e) {
      throw new AuthenticationFailed($e->getMessage(), $e->getCode());
    }

    if (!$data || !$data->token) {

      throw new AuthenticationFailed('token invalid', 403);

    }

    $this->HttpService->setHeaders([
      'Authorization' => 'Bearer ' . $data->token,
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
}