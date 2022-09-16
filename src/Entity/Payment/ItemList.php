<?php

namespace MercadoPago\PP\Sdk\Entity\Payment;

use MercadoPago\PP\Sdk\Common\AbstractCollection;

/**
 * Class ItemList
 *
 * @package MercadoPago\PP\Sdk\Entity\Payment
 */
class ItemList extends AbstractCollection
{

    public function add($entity, $key = null)
    {
        $item = new Item();
        $item->setData($entity);
        parent::add($item, $key);
    }

    public function __construct()
    {
    }

    /**
     * @codeCoverageIgnore
     */
    public function getProperties()
    {
        return get_object_vars($this);
    }
}
