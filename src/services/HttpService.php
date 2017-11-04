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
    protected static $endpoint;
    /**
     * @var  Response $response 
     */
    protected $response;
    /** @var  object */
    protected $body;
    protected $headers;

    use Singleton;

    /**
     * Initializes the HTTP Service
     * @param $endpoint
     * @return mixed
     */
    public static function init($endpoint)
    {
        self::getInstance();

        static::$endpoint = $endpoint;

        static::$HttpClient = new Client();

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
     * @param array $body
     * @return $this
     */
    public function post($route, $body = [])
    {
        $url = static::$endpoint . $route;

        $this->response = static::$HttpClient->request(
            'POST', $url,
            [
                'headers' => $this->getHeaders(),
                'json' => $body
            ]
        );

        return self::$instance;
    }

    /**
     * @param string $route
     * @return $this
     */
    public function get($route)
    {
        $url = static::$endpoint . $route;

        $this->response = static::$HttpClient->request(
            'GET', $url,
            [
                'headers' => $this->getHeaders()
            ]
        );

        return self::$instance;
    }

    /**
     * @param string $route
     * @param array $body
     * @return void
     */
    public function put($route, $body = [])
    {
        // todo Implement put method;
    }

    /**
     * @param string $route
     * @param array $body
     * @return void
     */
    public function patch($route, $body)
    {
        //todo Implement patch method
    }

    /**
     * @param string $route
     * @param array $body
     * @return void
     */
    public function delete($route, $body = [])
    {
        // todo Implement delete() method.
    }

}