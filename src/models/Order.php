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
use AffiliconApiClient\Exceptions\ConfigurationInvalid;
use AffiliconApiClient\Traits\HasEncryption;

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

    /** @var  string */
    protected $checkoutUrl;

    use HasEncryption;

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

    public function getCustomData()
    {
        return $this->customData;
    }

    public function getCheckoutUrl()
    {
        return $this->checkoutUrl;
    }

    protected function preparePrefillData()
    {
        $customData = [
            'custom' => $this->getCustomData()
        ];

        $prefillData = array_merge(
            $customData,
            $this->billingAddress->getData(),
            $this->shippingAddress->getData(),
            $this->basicAddress->getData()
        );

        $this->prefillData = $prefillData;

        return $prefillData;
    }

    public function generateCheckoutUrl()
    {
        $env = $this->client->getEnv();

        if (!$env->secure_url) {
            throw new ConfigurationInvalid('Secure-URL is not defined. Check the configurations.');
        }

        $baseUrl = $env->secure_url;

        $this->checkoutUrl =  $this->addUrlParams($baseUrl);
    }

    /**
     * @param string $originUrl
     * @return string
     */
    protected function addUrlParams($originUrl)
    {
        $prefillData = $this->toJson($this->preparePrefillData());
        $encryptedPrefillData = $this->encrypt($prefillData);

        $cartId = $this->cart()->getCartId();
        $clientId = $this->client->getClientId();
        $countryId = $this->client->getCountryId();
        $userLanguage = $this->client->getUserLanguage();
        $token = $this->client->getToken();

        $params = [
            "$clientId/redirect",
            "cartId/$cartId",
            "countryId/$countryId",
            "token/$token",
            "language/$userLanguage"
        ]; // todo testmode

        return $originUrl . "/" . join('/', $params) . "?prefill=$encryptedPrefillData";
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