<?php
/**
 * Copyright (C) Marcelle Hövelmanns, art solution - All Rights Reserved
 *
 * @file        HasHTTPRequests.php
 * @author      Marcelle Hövelmanns
 * @site        http://www.artsolution.de
 * @date        04.11.17
 */

namespace AffiliconApiClient\Traits;


use AffiliconApiClient\Client;
use AffiliconApiClient\Configurations\Config;
use AffiliconApiClient\Exceptions\ConfigurationInvalid;
use AffiliconApiClient\Services\HttpService;

/**
 * Trait HasRequests
 * @package AffiliconApiClient\Traits
 */
trait HasHTTPRequests
{
    /** @var  Client */
    protected $client;
    /** @var  string */
    protected $route;

    /**
     * @param array $body
     * @return HttpService
     */
    protected function post($body)
    {
        return $this->client->http()->post($this->route, $body);
    }

    protected function get()
    {
        return$this->client->http()->get($this->route);
    }

    /**
     * Sets the resource for the model
     * @return string
     * @throws ConfigurationInvalid
     */
    protected function setRoute()
    {
        $class = explode("\\", get_class($this));

        $route = Config::get('routes.' . $class[count($class) - 1]);

        if (!is_string($route)) {
            throw new ConfigurationInvalid('Route must be a string');
        }

        $this->route = $route;
    }
}