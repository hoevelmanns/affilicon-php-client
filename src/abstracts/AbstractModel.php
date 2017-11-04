<?php
/**
 * Copyright (C) Marcelle Hövelmanns, art solution - All Rights Reserved
 *
 * @file   Model.php
 * @author Marcelle Hövelmanns
 * @site   http://www.artsolution.de
 * @date   22.10.17
 */

namespace AffiliconApiClient\Abstracts;


use AffiliconApiClient\Client;
use AffiliconApiClient\Configurations\Config;
use AffiliconApiClient\Interfaces\ModelInterface;
use AffiliconApiClient\Services\HttpService;
use AffiliconApiClient\Traits\Collection;
use AffiliconApiClient\Traits\HasHTTPRequests;

abstract class AbstractModel implements ModelInterface
{

    protected $resource;
    /**
     * @var HttpService 
     */
    protected $HttpService;
    /**
     * @var Client  
     */
    protected $Client;
    protected $rows;

    public function __construct()
    {
        $this->setResource();
        $this->HttpService = HttpService::getInstance();
        $this->Client = Client::getInstance();
    }

    /**
     * Sets the resource for the model
     */
    protected function setResource()
    {
        $class = explode("\\", get_class($this));

        $this->resource = Config::get('routes.' . $class[count($class) - 1]);
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