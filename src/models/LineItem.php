<?php

/**
 * Copyright (C) Marcelle Hövelmanns, art solution - All Rights Reserved
 *
 * @file   CartItem.php
 * @author Marcelle Hövelmanns
 * @site   http://www.artsolution.de
 * @date   05.10.17
 */

namespace AffiliconApiClient\Models;

use AffiliconApiClient\Abstracts\AbstractModel;
use AffiliconApiClient\Interfaces\ModelInterface;
use AffiliconApiClient\Traits\HasHTTPRequests;

/**
 * Class CartItem
 *
 * @package Affilicon
 *
 * @property integer $id
 * @property string $cartId
 * @property integer $quantity
 * @property string $apiId
 * @property string $name
 * @property string $description
 * @property integer $price
 */

class LineItem extends AbstractModel implements ModelInterface
{
    use HasHTTPRequests;

    /**
     * Gets the quantity of the line item
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Gets the quantity of the line item
     * @param $quantity
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * Sets the it of the line item
     * @param $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Gets the id of the line item
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the api id of the line item
     * @param $apiId
     * @return $this
     */
    public function setApiId($apiId)
    {
        $this->apiId = $apiId;
        return $this;
    }

    /**
     * Gets the given api id of the line item
     * @return mixed
     */
    public function getApiId()
    {
        return $this->apiId;
    }

    /**
     * Sets the id of the cart
     * @param $cartId
     * @return $this
     */
    public function setCartId($cartId)
    {
        $this->cartId = $cartId;
        return $this;
    }

    /**
     * Sends the line item to the api
     * @return $this
     */
    public function store()
    {
        $body = [
            'cart_id' => $this->cartId,
            'product_id' => $this->id,
            'count' => $this->quantity
        ];

        $data = $this
            ->post($body)
            ->getData();

        $this->setApiId($data->id);

        return $this;
    }


}