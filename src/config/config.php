<?php
/**
 * Copyright (C) Marcelle Hövelmanns, art solution - All Rights Reserved
 *
 * @file        config.php
 * @author      Marcelle Hövelmanns
 * @site        http://www.artsolution.de
 * @date        26.10.17
 */

namespace Affilicon;

if (!defined('CONFIG')) {
  define('CONFIG', [
    'error_log' => [
    'path' => __DIR__ . '/logs/error.log'
    ]
  ]);
}
