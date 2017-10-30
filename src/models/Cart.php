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
use AffiliconApiClient\Client;
use AffiliconApiClient\Configurations\Config;
use AffiliconApiClient\Exceptions\CartCreationFailed;
use AffiliconApiClient\Services\HttpService;

/**
 * Class Cart
 * @package Affilicon
 *
 * @property string $id;
 * @property string $status
 *
 */

class Cart extends AbstractModel
{
  /** @var Collection $lineItems */
  protected $lineItems;
  protected $resource;

  /** @var  Client */
  protected $Client;
  /** @var  HttpService */
  protected $HttpService;

  public function __construct()
  {
    parent::__construct();
    $this->lineItems = new Collection();
    $this->resource = Config::get("routes.carts");
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

      $this->HttpService::post($this->resource, [
          'vendor' => $this->Client->getClientId()
      ]);

      $cart = $this->HttpService->getData();

    } catch (\Exception $e) {

      throw new CartCreationFailed($e->getMessage());

    }

    $this->id = $cart->data->id;
    $this->status = $cart->data->status;

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
   * @return $this
   */
  public function addLineItem(LineItem $item)
  {
    $this->HttpService::post(Config::get("routes.cartItemsProducts"), [
      'cart_id' => $this->getId(),
      'product_id' => $item->getId(),
      'count' => $item->getQuantity()
    ]);

    $lineItem = $this->HttpService->getData();

    $item->setApiId($lineItem->data->id);
    $this->lineItems->addItem($item);

    return $this;
  }

  /**
   * @param Collection $items
   */
  public function addLineItems(Collection $items)
  {
    while($items->next()) {
      if (!$items->current() instanceof LineItem) {
        continue;
      }

      $this->addLineItem($items->current());
    }
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