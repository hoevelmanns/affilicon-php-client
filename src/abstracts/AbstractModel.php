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

abstract class AbstractModel implements ModelInterface
{

    protected $resource;

    /** @var Client */
    protected $client;
    protected $rows;

    public function __construct()
    {
        $this->client = Client::getInstance();

        $this->resource = $this->getRoute();
    }

    /**
     * Gets the resource for the model
     * @return string
     */
    protected function getRoute()
    {
        $class = explode("\\", get_class($this));

        return Config::get('routes.' . $class[count($class) - 1]);
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