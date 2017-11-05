<?php
/**
 * Copyright (C) Marcelle Hövelmanns, art solution - All Rights Reserved
 *
 * @file   routes.php
 * @author Marcelle Hövelmanns
 * @site   http://www.artsolution.de
 * @date   24.10.17
 */

namespace AffiliconApiClient\Configurations;

return $routes = [

  /*
   * ---------------------------------------------------------------------
   * Routes Configurations
   * ---------------------------------------------------------------------
   */

  'routes' => [

    'auth' => [

      'anonymous' => 'api/auth/anonymous/token',

      'member' => 'api/auth/member/token',

      'refresh' => 'api/auth/refresh',

    ],

    // Models
    'Product' => 'api/products',

    'Cart' => 'api/carts',

    'LineItem' => 'api/cart-items/products'

  ]
];