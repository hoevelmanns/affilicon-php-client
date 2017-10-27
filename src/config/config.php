<?php
/**
 * Copyright (C) Marcelle Hövelmanns, art solution - All Rights Reserved
 *
 * @file        config.php
 * @author      Marcelle Hövelmanns
 * @site        http://www.artsolution.de
 * @date        26.10.17
 */

namespace Affilicon\ApiClient\Configurations;

if (!defined('CONFIG')) {
  define('CONFIG', [
    'environment' => [
      'production' => [
        'service_url' => 'http://service.affilicon.net'
      ]
    ],
    'error_log' => [
    'path' => __DIR__ . '/logs/error.log'
    ]
  ]);
}

