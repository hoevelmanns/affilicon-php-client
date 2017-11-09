<?php
/**
 * Copyright (C) Marcelle Hövelmanns, art solution - All Rights Reserved
 *
 * @file        Cart.php
 * @author      Marcelle Hövelmanns
 * @site        http://www.artsolution.de
 * @date        02.10.17
 */

namespace AffiliconApiClient\Models;

use AffiliconApiClient\Abstracts\AbstractModel;
use AffiliconApiClient\Exceptions\CartCreationFailed;

/**
 * Class Cart
 * @package Affilicon
 *
 */
class Cart extends AbstractModel
{
    /** @var Collection $lineItems */
    protected $lineItems;
    protected $resource;

    /** @var string */
    private $id;
    /** @var string */
    private $status;

    public function __construct()
    {
        parent::__construct();
        $this->lineItems = new Collection();
    }

    /**
     * create new cart
     *
     * @return $this
     * @throws CartCreationFailed
     */
    public function create()
    {
        try {

            $cart = $this->client
                ->http()
                ->post($this->resource, ['vendor' => $this->client->getClientId()])
                ->data();

        } catch (\Exception $e) {

            throw new CartCreationFailed($e->getMessage());

        }

        $this->id = $cart->id;
        $this->status = $cart->status;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param LineItem
     * @param $quantity
     * @return $this
     */
    public function addLineItem($itemId, $quantity)
    {
        $item = (new LineItem())
            ->setCartId($this->id)
            ->setId($itemId)
            ->setQuantity($quantity)
            ->store();

        $this->lineItems->addItem($item);

        return $this;
    }

    /**
     * get the cart items
     * @return mixed
     */
    public function getLineItems()
    {
        return $this->lineItems;
    }

}