<?php
/**
 * Copyright (C) Marcelle Hövelmanns, art solution - All Rights Reserved
 *
 * @file        Model.php
 * @author      Marcelle Hövelmanns
 * @site        http://www.artsolution.de
 * @date        22.10.17
 */

namespace AffiliconApiClient\Abstracts;


use AffiliconApiClient\Client;
use AffiliconApiClient\Configurations\Config;
use AffiliconApiClient\Interfaces\ModelInterface;
use AffiliconApiClient\Traits\HasHTTPRequests;

abstract class AbstractModel implements ModelInterface
{

    protected $route;

    /** @var Client */
    protected $client;
    protected $rows;

    use HasHTTPRequests;

    public function __construct()
    {
        $this->client = Client::getInstance();

        $this->setRoute();
    }

    /**
     * Sets the resource for the model
     * @return string
     */
    protected function setRoute()
    {
        $class = explode("\\", get_class($this));

        // todo route not found handling
        $this->route = Config::get('routes.' . $class[count($class) - 1]);
    }

    public function findById($id)
    {
        // TODO: Implement findById() method.
    }

    public function find($params, $with)
    {
        // TODO: Implement find() method.
    }

    public function fetch()
    {
        // TODO: Implement all() method.
    }

}