<?php
/**
 * Copyright (C) Marcelle Hövelmanns, art solution - All Rights Reserved
 *
 * @file   ProductModel.php
 * @author Marcelle Hövelmanns
 * @site   http://www.artsolution.de
 * @date   23.10.17
 */

namespace AffiliconApiClient\Models;


use AffiliconApiClient\Abstracts\AbstractModel;
use AffiliconApiClient\Traits\HasCollection;

/**
 * Class Product
 * @package AffiliconApiClient\Models
 */
class Product extends AbstractModel
{
    use HasCollection;
}