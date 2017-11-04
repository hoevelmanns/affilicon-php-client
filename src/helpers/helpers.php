<?php
/**
 * Copyright (C) Marcelle Hövelmanns, art solution - All Rights Reserved
 *
 * @file   helpers.php
 * @author Marcelle Hövelmanns
 * @site   http://www.artsolution.de
 * @date   29.10.17
 */


if (!function_exists('array_get')) {
    /**
     * @param $key
     * @return array|string
     */
    function array_get($array, $key)
    {
        foreach (explode('.', $key) as $segment) {
            if (array_accessible($array) && array_exists($segment, $array)) {
                $array = $array[$segment];
            } else {
                return null;
            }
        }

        return $array;
    }
}

if (!function_exists('array_accessible')) {
    /**
     * @param $value
     * @return bool
     */
    function array_accessible($value) 
    {
        return is_array($value);
    }
}

if (!function_exists('array_exists')) {
    /**
     * @param $key
     * @param $array
     * @return bool
     */
    function array_exists($key, $array)
    {
        return array_key_exists($key, $array);
    }
}