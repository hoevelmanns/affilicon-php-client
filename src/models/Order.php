<?php
/**
 * Copyright (C) Marcelle Hövelmanns, art solution - All Rights Reserved
 *
 * @file        Order.php
 * @author      Marcelle Hövelmanns
 * @site        http://www.artsolution.de
 * @date        11.11.17
 */

namespace AffiliconApiClient\Models;


use AffiliconApiClient\Abstracts\AbstractModel;

/**
 * Class Order
 * @package AffiliconApiClient\Models
 */
class Order extends AbstractModel
{
    /** @var Cart */
    protected $cart;

    /** @var BillingAddress */
    private $billingAddress;

    /** @var ShippingAddress */
    private $shippingAddress;

    /** @var BasicAddress */
    private $basicAddress;

    /** @var array */
    private $customData = [];

    /** @var array */
    private $prefillData = [];


    public function cart()
    {
        if (!$this->cart instanceof Cart) {
            $this->cart = (new Cart())->create();
        }

        return $this->cart;
    }
    /**
     * @param array $data
     */
    public function setShippingAddress($data)
    {
        if (!$this->shippingAddress instanceof ShippingAddress) {
            $this->shippingAddress = new ShippingAddress();
        }

        $this->shippingAddress->setData($data);
    }

    /**
     * @param array $data
     */
    public function setBillingAddress($data)
    {
        if (!$this->shippingAddress instanceof BillingAddress) {
            $this->billingAddress = new BillingAddress();
        }

        $this->billingAddress->setData($data);
    }

    /**
     * @param array $data
     */
    public function setBasicAddress($data)
    {
        if (!$this->basicAddress instanceof BasicAddress) {
            $this->basicAddress = new BasicAddress();
        }

        $this->basicAddress->setData($data);
    }

    /**
     * @return ShippingAddress
     */
    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    /**
     * @return BillingAddress
     */
    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

    /**
     * @return BasicAddress
     */
    public function getBasicAddress()
    {
        return $this->basicAddress;
    }

    public function addCustomData($data)
    {
        $this->customData = array_merge($this->customData, $data);

        return $this->customData;
    }

    public function getCheckoutUrl()
    {
        return $this->generateCheckoutUrl();
    }

    protected function preparePrefillData()
    {
        $prefillData = array_merge(
            $this->customData,
            $this->billingAddress->getData(),
            $this->shippingAddress->getData(),
            $this->basicAddress->getData()
        );

        $this->prefillData = $prefillData;
    }

    protected function generateCheckoutUrl()
    {
        $prefillData = $this->toJson($this->preparePrefillData());

        $encryptedPrefillData = $this->encrypt($prefillData);

        // todo get secure url from environment
        // todo base64 encode data
    }

    /**
     * Returns an encrypted string
     * @param string $data json encoded prefill data
     */
    protected function encrypt($data)
    {

    }

    /**
     * @param $data
     * @return string
     */
    protected function toJson($data)
    {
        return json_encode($data);
    }

}