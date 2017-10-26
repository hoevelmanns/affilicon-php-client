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

/**
 * Interface ClientInterface
 * @package Affilicon
 */

interface ClientInterface
{

  /**
   * Initializes the Client
   * @return Client
   */
  public function init();

  /**
   * Gets the instance of the client
   * @return Client
   */
  public static function getInstance();

  /**
   * Sets the username, only expected if you use the api as member or employee
   * @param string $username
   */
  public function setUserName($username);

  /**
   * Gets the username
   * @return string
   */
  public function getUsername();

  /**
   * Sets the password, only expected if you use the api as member or employee
   * @param string $password
   */
  public function setPassword($password);

  /**
   * Authenticate to api
   * @return string
   * @throws AuthenticationFailed
   */
  public function authenticate();

  /**
   * Checks if client is authenticated
   * @return bool
   */
  public function isAuthenticated();

  /**
   * Gets the token
   * @return string
   */
  public function getToken();

  /**
   * Sets the Client ID, previously called Vendor ID
   * @param string $id
   * @return $this
   */
  public function setClientId($id);

  /**
   * Gets the Client ID, previously called Vendor ID
   * @return string
   */
  public function getClientId();

  /**
   * Gets the specified country code
   * @return string
   */
  public function getCountryId();

  /**
   * Sets the country code, eg. "en-US"
   * @param $countryId
   * @return string $this
   */
  public function setCountryId($countryId);

  /**
   * Gets the specified user language
   * @return string
   */
  public function getUserLanguage();

  /**
   * Sets the user language, eg. "en"
   * @param string $userLanguage
   * @return $this
   */
  public function setUserLanguage($userLanguage);

}