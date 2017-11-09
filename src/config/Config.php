<?php
/**
 * Copyright (C) Marcelle Hövelmanns, art solution - All Rights Reserved
 *
 * @file   Config.php
 * @author Marcelle Hövelmanns
 * @site   http://www.artsolution.de
 * @date   29.10.17
 */

namespace AffiliconApiClient\Configurations;


use AffiliconApiClient\Exceptions\ConfigurationInvalid;
use AffiliconApiClient\Traits\Singleton;

class Config
{
    protected static $config;

    use Singleton;

    public function __construct()
    {
        try {

            $global = include "config.php";
            $routes = include "routes.php";

        } catch (\Exception $e) {

            throw new ConfigurationInvalid('configuration is missing or invalid');

        }

        self::$config = array_merge($global, $routes);
    }

    /**
     * @param $key
     * @return array
     */
    public static function get($key)
    {
        self::getInstance();

        return array_get(self::$config, $key);
    }

}