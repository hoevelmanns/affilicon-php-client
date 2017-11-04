<?php
/**
 * Copyright (C) Marcelle Hövelmanns, art solution - All Rights Reserved
 *
 * @file        Collection.php
 * @author      Marcelle Hövelmanns
 * @site        http://www.artsolution.de
 * @date        04.11.17
 */

namespace AffiliconApiClient\Traits;


use AffiliconApiClient\Models\Collection;

/**
 * Trait Collection
 * @package AffiliconApiClient\Traits
 */
trait HasCollection
{
    /** @var Collection  */
    protected $arrData;

    public function __construct()
    {
        $this->arrData = new Collection();
    }

}