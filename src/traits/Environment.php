<?php

/**
 * Copyright (C) Marcelle Hövelmanns, art solution - All Rights Reserved
 *
 * @file   Environment.php
 * @author Marcelle Hövelmanns
 * @site   http://www.artsolution.de
 * @date   27.10.17
 */

namespace AffiliconApiClient\Traits;


use AffiliconApiClient\Exceptions\ConfigurationInvalid;
use AffiliconApiClient\Services\ConfigService;

/**
 * Trait Environment
 *
 * @package AffiliconApiClient\Traits
 */
trait Environment
{

    protected $environment;

    /**
     * Sets the environment, default 'production'
     *
     * @return $this
     * @throws ConfigurationInvalid
     */
    public function setEnvironment()
    {
        $environmentName = $this->options['environment'];

        if (!$environmentName) {
            $environmentName = 'production';
        }

        $environment = $this->config
            ->get("environment.$environmentName");

        if (!$environment) {
            throw new ConfigurationInvalid("Configuration for given environment not found");
        }

        $this->environment = (object) $environment;

        return $this;
    }

    //todo function getEnvironment KeyValue
}
