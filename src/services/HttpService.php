<?php
/**
 * Copyright (C) Marcelle Hövelmanns, art solution - All Rights Reserved
 *
 * @file        HttpService.php
 * @author      Marcelle Hövelmanns
 * @site        http://www.artsolution.de
 * @date        25.10.17
 */

namespace Affilicon\ApiClient\Services;


use Affilicon\ApiClient\Abstracts\AbstractHttpService;
use Affilicon\ApiClient\Interfaces\HttpServiceInterface;
use Affilicon\ApiClient\Traits\Singleton;

class HttpService extends AbstractHttpService implements HttpServiceInterface
{
  use Singleton;
}