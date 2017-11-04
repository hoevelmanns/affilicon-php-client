<?php
/**
 * Copyright (C) Marcelle Hövelmanns, art solution - All Rights Reserved
 *
 * @file   Cart.php
 * @author Marcelle Hövelmanns
 * @site   http://www.artsolution.de
 * @date   02.10.17
 */

namespace AffiliconApiClient\Models;

use AffiliconApiClient\Abstracts\AbstractModel;
use AffiliconApiClient\Exceptions\CartCreationFailed;
use AffiliconApiClient\Traits\HasHTTPRequests;

/**
 * Class Cart
 *
 * @package Affilicon
 *
 * @property string $id
 * @property string $status
 */
class Cart extends AbstractModel
{
    /** @var Collection */
    protected $lineItems;

    use HasHTTPRequests;

    public function __construct()
    {
        parent::__construct();
        $this->lineItems = new Collection();
    }

    /**
     * Creates a new cart
     *
     * @return $this
     * @throws CartCreationFailed
     */
    public function create()
    {
        try {

            $body = [
                'vendor' => $this->Client->getClientId()
            ];

            $cart = $this
                ->post($body)
                ->getData();

        } catch (\Exception $e) {

            throw new CartCreationFailed($e->getMessage());

        }

        $this->id = $cart->data->id;
        $this->status = $cart->data->status;

        return $this;
    }

    /**
     * Gets the status of the cart
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Gets the cart id
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add a line item to the cart
     * @param LineItem
     * @param $quantity
     * @return $this
     */
    public function addLineItem($itemId, $quantity)
    {
        $item = (new LineItem())
        ->setId($itemId)
        ->setCartId($this->id)
        ->setQuantity($quantity)
        ->store();

        $this->lineItems->addItem($item);

        return $this;
    }

    /**
     * Get the cart items
     * @return mixed
     */
    public function getLineItems()
    {
        return $this->lineItems;
    }

}