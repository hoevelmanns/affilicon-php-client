<?php
/**
 * Copyright (C) Marcelle Hövelmanns, art solution - All Rights Reserved
 *
 * @file        config.php
 * @author      Marcelle Hövelmanns
 * @site        http://www.artsolution.de
 * @date        26.10.17
 */

namespace AffiliconApiClient\Configurations;

return [

    /*
     * ---------------------------------------------------------------------
     * Environment Configuration
     * ---------------------------------------------------------------------
     */

    'environment' => [

        // Production
        'production' => [
            'service_url' => 'https://service.affilicon.net/api',
            'secure_url' => 'https://secure.affilibank.de'
        ],

        // Development
        'development' => [
            'service_url' => 'https://service.affilicon.app/api',
            'secure_url' => 'https://secure.affilibank.app'
        ],

        // Staging
        'staging' => [
            'service_url' => 'https://service-q.affilicon.net/api',
            'secure_url' => 'https://secure-q.affilibank.de'
        ]

    ],

    'address' => [
        'basic' => [
            'email' => 'basic_addr_email',
            'company' => 'basic_addr_company',
            'firstname' => 'basic_addr_firstname',
            'lastname' => 'basic_addr_lastname',
            'address_1' => 'basic_addr_lastname',
            'address_2' => 'basic_addr_street',
            'city' => 'basic_addr_city',
            'postcode' => 'basic_addr_zip',
            'country' => 'basic_addr_street2',
            //'phone' => 'basic_addr_lastname',
            //'fax' => 'basic_addr_lastname',
            //'mobile' => 'basic_addr_lastname',
        ],
        'billing' => [
            'company' => 'billing_addr_company',
            'firstname' => 'billing_addr_firstname',
            'lastname' => 'billing_addr_lastname',
            'address_1' => 'billing_addr_lastname',
            'address_2' => 'billing_addr_street',
            'city' => 'billing_addr_city',
            'postcode' => 'billing_addr_zip',
            'country' => 'billing_addr_street2'
        ],
        'shipping' => [
            'company' => 'shipping_addr_company',
            'firstname' => 'shipping_addr_firstname',
            'lastname' => 'shipping_addr_lastname',
            'address_1' => 'shipping_addr_lastname',
            'address_2' => 'shipping_addr_street',
            'city' => 'shipping_addr_city',
            'postcode' => 'shipping_addr_zip',
            'country' => 'shipping_addr_street2'
        ]
    ],

    'error_log' => [
        'path' => __DIR__ . '/logs/error.log'
    ],

    'security' => [
        'crypt_method' => 'blowfish'
    ]

];

