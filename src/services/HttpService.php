<?php
/**
 * Copyright (C) Marcelle Hövelmanns, art solution - All Rights Reserved
 *
 * @file        HttpService.php
 * @author      Marcelle Hövelmanns
 * @site        http://www.artsolution.de
 * @date        25.10.17
 */

namespace AffiliconApiClient\Services;


use AffiliconApiClient\Abstracts\AbstractHttpService;
use AffiliconApiClient\Interfaces\HttpServiceInterface;
use AffiliconApiClient\Traits\Singleton;

class HttpService extends AbstractHttpService implements HttpServiceInterface
{
  use Singleton;
}