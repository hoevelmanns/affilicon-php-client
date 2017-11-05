<?php
/**
 * Copyright (C) Marcelle Hövelmanns, art solution - All Rights Reserved
 *
 * @file   HttpService.php
 * @author marcelle.hoevelmanns@artsolution.de
 * @site   http://www.artsolution.de
 * @date   25.10.17
 */

namespace AffiliconApiClient\Services;


use AffiliconApiClient\Traits\Singleton;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

/**
 * Class HttpService
 * @package AffiliconApiClient\Services
 */
class HttpService
{
    /**
     * @var Client
     */
    protected static $HttpClient;
    /**
     * @var Response $response
     */
    protected $response;
    /** @var  object */
    protected $body;
    protected $headers;

    use Singleton;

    /**
     * Initializes the HTTP Service
     * @param $baseUri
     * @return mixed
     */
    public static function init($baseUri)
    {
        self::getInstance();

        static::$HttpClient = new Client([
            'base_uri' => $baseUri,
            'Content-Type' => 'application/json'
        ]);

        return self::$instance;
    }

    /**
     * Sets headers for the requests
     * @param array $headers
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;
    }

    /**
     * Gets the header
     * @return mixed
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Gets the body of the response
     * @return object
     */
    public function body()
    {
        $responseBody = json_decode($this->response->getBody(), true);

        if (array_exists('data', $responseBody)) {
            $responseBody['data'] = (object) $responseBody['data'];
        }

        $this->body = (object) $responseBody;

        return $this->body;
    }

    /**
     * Returns the data of the response
     * @return mixed
     */
    public function data()
    {
        return $this->body()->data;
    }

    /**
     * Submits a post request
     * @param string $route
     * @param array $data
     * @return $this
     */
    public function post($route, $data = [])
    {
        $this->response = static::$HttpClient->post($route, [
            'json' => $data,
            'headers' => static::getHeaders()
        ]);

        return self::$instance;
    }

    /**
     * @param string $route
     * @return $this
     */
    public function get($route)
    {
        $this->response = static::$HttpClient->get($route, [
            'headers' => static::getHeaders()
        ]);

        return self::$instance;
    }

    /**
     * @param string $route
     * @param array $data
     * @return $this
     */
    public function put($route, $data = [])
    {
        $this->response = static::$HttpClient->put($route, [
            'headers' => static::getHeaders(),
            'json' => $data
        ]);

        return self::$instance;
    }

    /**
     * @param string $route
     * @param array $data
     * @return $this
     */
    public function patch($route, $data)
    {
        $this->response = static::$HttpClient->patch($route, [
            'headers' => static::getHeaders(),
            'json' => $data
        ]);

        return self::$instance;
    }

    /**
     * @param string $route
     * @param array $data
     * @return $this
     */
    public function delete($route, $data = [])
    {
        $this->response = static::$HttpClient->delete($route, [
            'headers' => static::getHeaders(),
            'json' => $data
        ]);

        return self::$instance;
    }

}