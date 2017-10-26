<?php
/**
 * Copyright (C) Marcelle Hövelmanns, art solution - All Rights Reserved
 *
 * @file        Cart.php
 * @author      Marcelle Hövelmanns
 * @site        http://www.artsolution.de
 * @date        02.10.17
 */

namespace Affilicon;

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
  public static $lineItems;
  protected $resource;
  /** @var  HttpService */
  protected $HttpService;
  /** @var  AbstractClient */
  protected $Client;

  public function __construct()
  {
    parent::__construct();
    self::$lineItems = new Collection();
    $this->resource = API['routes']['carts'];
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
      $cart = $this->HttpService
        ->post($this->resource, ['vendor' => $this->Client->getClientId()])
        ->getData();

    } catch (\Exception $e) {

      throw new CartCreationFailed($e->getMessage());

    }

    $this->id = $cart->data->id;
    $this->status = $cart->data->status;

    return $this;
  }

  public static function lineItems()
  {
    return self::$lineItems;
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
    $lineItem = $this->HttpService
      ->post(API['routes']['cartItemsProducts'], [
        'cart_id' => $this->getId(),
        'product_id' => $item->getId(),
        'count' => $item->getQuantity()
    ])->getData();

    $item->setApiId($lineItem->data->id);
    $this->lineItems()->addItem($item);

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
  public function getItems()
  {
    return self::lineItems();
  }

}