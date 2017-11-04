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


use AffiliconApiClient\Services\HttpService;

/**
 * Trait HasRequests
 * @package AffiliconApiClient\Traits
 */
trait HasHTTPRequests
{
    /** @var  HttpService */
    protected $HttpService;
    /** @var  string */
    protected $resource;

    /**
     * @param array $body
     * @return HttpService
     */
    protected function post($body)
    {
        return $this->HttpService->post($this->resource, $body);
    }
}