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
   * post request
   * @param string $route
   * @param array $args
   * @return array|mixed|object
   */
  public function post($route, array $args = []);

  /**
   * @param string $route
   * @param array $args
   */
  public function put($route, array $args = []);

  /**
   * get request
   * @param string $route
   * @return object
   */
  public function get($route);

  /**
   * Return the request body
   * @param string $response
   * @return object
   */
  public function responseBody($response);

  /**
   * Add the request headers
   * @return array
   */
  public function headers();

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

  /**
   * @return Cart
   */
  public static function cart();
}