<?php
/**
 * Copyright (C) Marcelle Hövelmanns, art solution - All Rights Reserved
 *
 * @file        ClientInterface.php
 * @author      Marcelle Hövelmanns
 * @site        http://www.artsolution.de
 * @date        24.10.17
 */

namespace Affilicon;


interface ClientInterface
{

  public function init();

  public static function getInstance();

  /**
   * @param string $username
   */
  public function setUserName($username);

  /**
   * @return string
   */
  public function getUsername();

  /**
   * @param string $password
   */
  public function setPassword($password);

  /**
   * @return bool
   */
  public function isAuthenticated();

  /**
   * authenticate to api
   * @return \ErrorException
   * @throws \ErrorException
   */
  public function authenticate();

  /**
   * @return string
   */
  public function getToken();

  /**
   * set the Client ID, previously called Vendor ID
   * @param string $id
   * @return $this
   */
  public function setClientId($id);

  /**
   * get the Client ID, previously called Vendor ID
   * @return mixed
   */
  public function getClientId();

  /**
   * @return mixed
   */
  public function getCountryId();

  /**
   * @param string $countryId
   * @return $this
   */
  public function setCountryId($countryId);

  /**
   * @return string
   */
  public function getUserLanguage();

  /**
   * @param string $userLanguage
   * @return $this
   */
  public function setUserLanguage($userLanguage);

}